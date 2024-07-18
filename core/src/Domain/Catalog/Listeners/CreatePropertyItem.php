<?php

namespace Domain\Catalog\Listeners;

class CreatePropertyItem
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
        $event->propertyItem->position = $event->propertyItem->max('position') + 1;
    }
}
