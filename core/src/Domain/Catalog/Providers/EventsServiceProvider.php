<?php

namespace Domain\Catalog\Providers;

use Domain\Catalog\Events\CreatedCategoryEvent;
use Domain\Catalog\Events\CreatedProductEvent;
use Domain\Catalog\Listeners\CreateCategoryItem;
use Domain\Catalog\Listeners\CreateProductItem;
use Domain\Catalog\Models\Category;
use Domain\Catalog\Observers\CategoryObserver;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventsServiceProvider extends ServiceProvider
{

    protected $listen = [

        CreatedCategoryEvent::class => [
            CreateCategoryItem::class,
        ],
        CreatedProductEvent::class => [
            CreateProductItem::class,
        ],
    ];
    public function boot()
    {
        parent::boot();

        Category::observe(CategoryObserver::class);
    }
}
