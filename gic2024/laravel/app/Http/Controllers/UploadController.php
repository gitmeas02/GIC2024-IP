<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'document' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $file = $request->file('document'); // file get from form html blade  
        //strtolower convert converts a string to lowercase.
        $extension = strtolower($file->getClientOriginalExtension());//returns the original file extension
        $fileName = uniqid() . '.' . $extension;// uniqid : unique identifier

        // Store original file to local 'public' disk
        $localPath = $file->storeAs('uploads', $fileName, 'public');

        // Upload original file to MinIO
        $minioOriginalPath = 'uploads/' . $fileName;    //file_get_contents: the preferred way to read the contents of a file into a string
        Storage::disk('minio')->put($minioOriginalPath, file_get_contents($file));

        $isImage = in_array($extension, ['jpg', 'jpeg', 'png']);
        $thumbnailLocalPath = null;
        $thumbnailMinioPath = null;

        if ($isImage) {
            //Generate thumbnail
            //Take the uploaded image, resize it to 200x200 without 
            //stretching it, and save it as a compressed copy (90% quality) 
            //using the same file format.
            $thumbnail = Image::make($file->getRealPath()) 
                ->fit(200, 200, function ($constraint) {
                    $constraint->aspectRatio();//allows to define the desired width-to-height ratio of an element's box
                }) //encode Convert the image into a binary string format
                ->encode($extension, 90);

            // Local thumbnail path
            $thumbnailLocalPath = 'thumbnails/' . $fileName;
            Storage::disk('public')->put($thumbnailLocalPath, $thumbnail->__toString());

            // MinIO thumbnail path
            $thumbnailMinioPath = 'thumbnails/' . $fileName;

            // Ensure 'thumbnails' folder is visible in MinIO
            if (!Storage::disk('minio')->exists('thumbnails/.keep')) {
                Storage::disk('minio')->put('thumbnails/.keep', '');
            }

            // Upload thumbnail to MinIO
            Storage::disk('minio')->put($thumbnailMinioPath, $thumbnail->__toString());
        }

        return response()->json([
            'local_path' => $localPath ? 'storage/' . $localPath : false,
            'minio_path' => $minioOriginalPath,
            'thumbnail_local' => $thumbnailLocalPath ? 'storage/' . $thumbnailLocalPath : null,
            'thumbnail_minio' => $thumbnailMinioPath,
        ], 200);
    }
}