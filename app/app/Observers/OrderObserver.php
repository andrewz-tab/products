<?php

namespace App\Observers;

use App\Events\OrderEventService;
use App\Models\Order;

class OrderObserver
{
    public function creating(Order $order): void
    {
        $eventService = new OrderEventService($order);

        $eventService->setFieldsFromProduct();
    }
}
