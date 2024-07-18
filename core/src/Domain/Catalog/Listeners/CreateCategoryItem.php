<?php

namespace Domain\Catalog\Listeners;

class CreateCategoryItem
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
        $event->categoryItem->position = $event->categoryItem->max('position') + 1;
    }
}
