<?php

use Domain\Catalog\Models\Category;
use Domain\Product\Models\Product;
use Support\Services\ImageUploadService;

if (!function_exists('cart')) {
    function cart(): \Domain\Cart\CartManager
    {
        return app(\Domain\Cart\CartManager::class);
    }
}

if (!function_exists('sorter')) {
    function sorter(): \Domain\Catalog\Sorters\Sorter
    {
        return app(\Domain\Catalog\Sorters\Sorter::class);
    }
}

if (!function_exists('flash')) {
    function flash(): \Support\Flash\Flash
    {
        return app(\Support\Flash\Flash::class);
    }

}
if (!function_exists('filters')) {
    function filters(): array
    {
        return app(\Domain\Catalog\Filters\FilterManager::class)->items();
    }

}

if (!function_exists('is_catalog_view')) {
    function is_catalog_view(string $type, string $default = 'grid'): bool
    {
        return session('view', $default) === $type;
    }
}

if (!function_exists('filter_url')) {
    function filter_url(?\Domain\Catalog\Models\Category $category, array $params = []): string
    {
        return route('catalog', $category, [
            ...request()->only(['sort', 'filters']),
            ...$params,
            'category' => $category
        ]);
    }
}

if (!function_exists('get_catalog_image_path')) {
    function get_catalog_image_path($key = ''): string
    {
        return 'assets/images/catalog/'.$key;
    }
}

if (!function_exists('get_catalog_image_size')) {
    function get_catalog_image_size($key = ''): string
    {
        if($key == 'category'){
            return '400x280';
        }
        if($key == 'product'){
            return '400x280';
        }
        else return '200x200';
    }
}

if (!function_exists('get_catalog_image_thumb_size')) {
    function get_catalog_image_thumb_size($key = ''): string
    {
        if($key == 'category'){
            return '304x175';
        }
        if($key == 'product'){
            return '304x175';
        }
        else return '304x175';
    }
}

if (!function_exists('getCatalogImage')) {
    function getCatalogImage($path, $image, $thumbPrefix = ''): string
    {
        $path = $path . '/' . $thumbPrefix.$image;
//        dd($path);
        return ImageUploadService::getImage($path);
    }
}
