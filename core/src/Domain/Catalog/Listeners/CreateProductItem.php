<?php

namespace Domain\Catalog\Listeners;

class CreateProductItem
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
    public function handle(object $event): void
    {
        $event->productItem->position = $event->productItem->max('position') + 1;
    }
}
