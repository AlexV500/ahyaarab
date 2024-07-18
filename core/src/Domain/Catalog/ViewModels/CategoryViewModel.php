<?php

namespace Domain\Catalog\ViewModels;

use Spatie\ViewModels\ViewModel;
use Domain\Catalog\Cache\CategoryCacheEnum;
use Domain\Catalog\Models\Category;
use Domain\Product\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Support\Traits\Makeable;

class CategoryViewModel extends ViewModel
{
    use Makeable;

    public function __construct(
        public ?Category $category
    ) {
    }

    public function categories(): Collection|array
    {
        return Category::query()
            ->select(['id', 'title', 'slug', 'meta_keywords', 'meta_description', 'text', 'position', 'image'])
            ->orderBy('position', 'ASC')
            ->get();
    }
    public function products(): LengthAwarePaginator
    {
        return $this->category->products()->orderBy('position', 'ASC')
            ->paginate(6);

//        return Product::query()
//            ->select(['id', 'title', 'slug', 'meta_keywords', 'meta_description', 'text', 'price', 'position', 'image'])
//            ->withCategory($this->category)
//            ->orderBy('position', 'ASC')
//            ->paginate(6);
    }
    public function homePage(): Collection|array
    {
        return Cache::rememberForever(CategoryCacheEnum::CategoryHomePage->key(), function () {
            return Category::query()
                ->homePage()
                ->get();
        });
    }
}
