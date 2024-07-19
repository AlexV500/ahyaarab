<?php

namespace App\Listeners;

use App\Events\OrderPlaced;
use Domain\Order\Processes\AssignProducts;
use Domain\Order\Processes\ChangeStateToPending;
use Domain\Order\Processes\ClearCart;
use Domain\Order\Processes\OrderProcess;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OrderCreation
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderPlaced $event): void
    {
        $orderRequest = $event->orderRequest;
        $orderAction = $event->orderAction;

        $order = $orderAction($orderRequest);

        (new OrderProcess($order))->processes([
            //     new CheckProductQuantities(),
            //     new AssignCustomer(request('customer')),
            new AssignProducts(),
            new ChangeStateToPending(),
            //     new DecreaseProductsQuantities(),
            new ClearCart()
        ])->run();
    }
}
