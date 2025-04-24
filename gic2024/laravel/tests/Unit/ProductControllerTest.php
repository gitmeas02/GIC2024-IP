<?php

namespace Tests\Unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{   
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    // public function test_returns_no_data_when_no_products_exist()
    // {
    //     $response = $this->getJson('/api/products');

    //     $response->assertStatus(200);
    // }
   

// public function test_product_creation_with_valid_category_id()
//     {
//         // Use a valid category ID that already exists in your database
//         $category_id = 1; // Make sure this ID actually exists in the 'categories' table
    
//         // Confirm that the category ID is valid (optional)
//         $this->assertNotNull($category_id);
    
//         $payload = [
//             'name' => 'Nike Air Max',
//             'category_id' => $category_id,
//             'pricing' => 120.00,
//             'description' => 'Comfortable running shoes',
//             'images' => ['nike1.jpg', 'nike2.jpg']
//         ];
    
//         // Send a POST request to create a product
//         $response = $this->postJson('/api/products', $payload);
    
//         // Assert that the response is 201 (Created) and contains the expected data
//         $response->assertStatus(201)
//                  ->assertJson([
//                      'name' => $payload['name'],
//                      'category_id' => $payload['category_id'],
//                      'pricing' => $payload['pricing'],
//                      'description' => $payload['description'],
//                      'images' => $payload['images'],
//                  ]);
//     }
    

    // public function test_product_get_with_product_by_id()
    // {
    //     $product_id = 12;
    //     $category_id=11;
    //      $this->assertNotNull($category_id); // Ensure it exists
 
    //      $product_details= [
    //          'name' => 'Nike Air Max',
    //          'category_id' => $category_id,
    //          'pricing' => 120.00,
    //          'description' => 'Comfortable running shoes',
    //          'images' => ['nike1.jpg', 'nike2.jpg']
    //      ];

    //     $response = $this->getJson("/api/products/{$product_id}");

    //     $response->assertStatus(200)
    //              ->assertJson([
    //                  'id' => $product_id ,
    //                  'name' => $product_details['name'],    
    //                  'category_id' => $product_details['category_id'],
    //                  'pricing' => $product_details['pricing'],
    //                  'description' => $product_details['description'],
    //                  'images' => $product_details['images'],
    //              ]);
    // }
    // public function test_product_update_with_product_by_id()
    // {
    //     $category = Category::find(83);

    //     $this->assertNotNull($category);

    //     $product = Product::findOrFail(3);

    //     $payload = [
    //         'name' => 'Updated Product Name',
    //         'category_id' => $category->id,
    //         'pricing' => 150.00,
    //         'description' => 'Updated description',
    //         'images' => ['updated1.jpg', 'updated2.jpg']
    //     ];

    //     $response = $this->patchJson("/api/products/{$product->id}", $payload);

    //     $response->assertStatus(200)
    //              ->assertJson([
    //                  'id' => $product->id,
    //                  'name' => $payload['name'],
    //                  'category_id' => $payload['category_id'],
    //                  'pricing' => $payload['pricing'],
    //                  'description' => $payload['description'],
    //              ]);
    // }

    // public function test_product_delete_with_product_by_id()
    // {
    //     // Create a product using the factory (if you have set up a factory for Product)
    //     $ExistProduct = 12;
    
    //     // Send a DELETE request to the API to delete the product
    //     $response = $this->deleteJson("/api/products/{$ExistProduct}");
    
    //     // Assert that the response status is 200 and the success message is returned
    //     $response->assertStatus(200)
    //              ->assertJson([
    //                  'message' => 'Product deleted successfully'
    //              ]);
    //     }
}
