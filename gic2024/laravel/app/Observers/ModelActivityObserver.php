<?php

namespace App\Observers;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

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
    public function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }
}
