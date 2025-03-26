<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use App\Models\ActivityLog;
class ModelActivityObserver
{
    
    public function created(Model $model): void
    {
        ActivityLog::create([
            'model' => get_class($model),
            'model_id' => $model->id,
            'action' => 'created',
            'change' => json_encode($model->toArray()),
        ]);
    }


    public function updated(Model $model): void
    {
        ActivityLog::create([
            'model' => get_class($model),
            'model_id' => $model->id,
            'action' => 'updated',
            'change' => json_encode([
                'old' => $model->getOriginal(),
                'new' => $model->getChanges(),
            ]),
        ]);
    }

  
    public function deleted(Model $model): void
    {       
        ActivityLog::create([
            'model'   => get_class($model),
            'model_id' => $model->id,
            'action' => 'deleted',
            'change' => json_encode($model->toArray()),
    ]);
    }

    /**
     * Handle the Order "restored" event.
     */
    public function restored(Model $model): void
    {
        ActivityLog::create([
            'model' => get_class($model),
            'model_id' => $model->id,
            'action' => 'restored',
            'changes' => json_encode($model->toArray()),
        ]);

    }
 
    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Model $Model): void
    {
        //
    }
}
