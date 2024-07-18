<?php

namespace App\Http\Controllers\Admin\Catalog\Product;

use App\Http\Controllers\Admin\Catalog\BaseController;
use Domain\Catalog\Models\Category;
use Domain\Product\Models\Product;
use Domain\Product\Models\Property;
use Support\Services\ImageUploadService;

class EditController extends BaseController{

    public function __invoke(Product $product){

        $properties = $product->properties->keyValues();
//        dd($product->categories->pluck('id'));
        $path  = get_catalog_image_path('product');
//        dd($product->image);
        $imageSize = get_catalog_image_size('product');
    //    dd($properties);

        $addViewVariables = [
            'pageTitle' => 'Edit Product',
            'product' => $product,
            'categories' => Category::get(),
            'properties' => Property::get(),
            'relatedProperties' => $properties,
            'imagePath' => ImageUploadService::getImage($path.'/'.$product->image),
            'imageSize' => $imageSize
        ];
        return view('admin.catalog.product.edit', $this->mergeViewVariables($addViewVariables));
    }
}
