<?php

namespace Domain\Catalog\ViewModels\Admin;

use Domain\Catalog\Models\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Spatie\ViewModels\ViewModel;

class CategoryViewModel extends ViewModel
{
    public function __construct(
        public ?Category $category
    )
    {
    }

    public function categories(): Collection|array
    {
        return Category::query()
            ->select(['id', 'title', 'slug', 'meta_keywords', 'meta_description', 'text', 'position', 'image'])
            ->orderBy('position', 'ASC')
            ->get();
    }

}
