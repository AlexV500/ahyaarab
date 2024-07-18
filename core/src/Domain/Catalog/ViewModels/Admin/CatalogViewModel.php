<?php

namespace Domain\Catalog\ViewModels\Admin;

use Domain\Catalog\Models\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Spatie\ViewModels\ViewModel;

class CatalogViewModel extends ViewModel
{
    public function __construct(

    ) {
    }

    public function categories(): Collection|array
    {
        return Category::query()
            ->select(['id', 'title', 'slug'])
            ->get();
    }


}
