<?php

namespace Domain\Catalog\ViewModels\Admin;

use Domain\Catalog\Models\Category;
use Domain\Product\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\ViewModels\ViewModel;

class ProductViewModel extends ViewModel
{
    public function __construct(
        public ?Category $category
    ) {
    }

//    public function product(): Collection|array
//    {
//        return Product::query()
//            ->select(['id', 'title', 'slug'])
//            ->get();
//    }



    public function products(): LengthAwarePaginator
    {
        return Product::query()
            ->select(['id', 'title', 'slug', 'meta_keywords', 'meta_description', 'text', 'price', 'position', 'json_properties'])
            ->paginate(10);
    }
}
