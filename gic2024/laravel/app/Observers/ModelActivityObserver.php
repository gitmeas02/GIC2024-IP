<?php

namespace App\Observers;

use App\Models\Order;
use App\Models\ActivityLog;
class ModelActivityObserver
{
    
    public function created(Order $order): void
    {
        ActivityLog::create([
            'model' => get_class($order),
            'model_id' => $order->id,
            'action' => 'created',
            'change' => json_encode($order->toArray()),
        ]);
    }


    public function updated(Order $order): void
    {
        ActivityLog::create([
            'model' => get_class($order),
            'model_id' => $order->id,
            'action' => 'updated',
            'change' => json_encode([
                'old' => $order->getOriginal(),
                'new' => $order->getChanges(),
            ]),
        ]);
    }

  
    public function deleted(Order $order): void
    {       
        ActivityLog::create([
            'model'   => get_class($order),
            'model_id' => $order->id,
            'action' => 'deleted',
            'change' => json_encode($order->toArray()),
    ]);
    }

    /**
     * Handle the Order "restored" event.
     */
    public function restored(Order $order): void
    {
        ActivityLog::create([
            'model' => get_class($order),
            'model_id' => $order->id,
            'action' => 'restored',
            'changes' => json_encode($order->toArray()),
        ]);

    }
 
    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }
}
