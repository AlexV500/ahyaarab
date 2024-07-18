<?php

namespace Domain\Catalog\ViewModels\Admin;

use Domain\Product\Models\Property;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Spatie\ViewModels\ViewModel;

class PropertyViewModel extends ViewModel
{
    public function __construct(

    ) {
    }

    public function properties(): LengthAwarePaginator
    {
        return Property::query()
            ->select(['id', 'title', 'position'])
            ->paginate(15);
    }
}
