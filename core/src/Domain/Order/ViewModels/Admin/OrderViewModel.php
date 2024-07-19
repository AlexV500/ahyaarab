<?php

namespace Domain\Order\ViewModels\Admin;

use Domain\Order\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Spatie\ViewModels\ViewModel;

class OrderViewModel extends ViewModel
{
    public function __construct(
        public ?Order $order
    )
    {
    }

    public function newOrders(): Collection|array
    {
        return Order::query()
            ->select()
            ->where('status', '=', OrderStatuses::New)
            ->get();
    }

    public function pendingOrders(): Collection|array
    {
        return Order::query()
            ->select()
            ->where('status', '=', OrderStatuses::Pending)
            ->get();
    }

    public function paidOrders(): Collection|array
    {
        return Order::query()
            ->select()
            ->where('status', '=', OrderStatuses::Paid)
            ->get();
    }

    public function cancelledOrders(): Collection|array
    {
        return Order::query()
            ->select()
            ->where('status', '=', OrderStatuses::Cancelled)
            ->get();
    }
}
