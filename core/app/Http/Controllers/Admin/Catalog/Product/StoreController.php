<?php

namespace App\Http\Controllers\Admin\Catalog\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Catalog\Product\StoreRequest;
use Domain\Catalog\Models\Category;
use Domain\Product\Models\Product;
use Support\Services\ImageUploadService;
use Support\Services\ProductService;

class StoreController extends Controller{

    public function __invoke(StoreRequest $request, Product $product){
      //  dd($_POST);
        $data = $request->validated();

        $productService = app()->make(ProductService::class);
        if ($request->hasFile('image')) {
            $path  = 'assets/images/catalog/product';
            $data['image'] = ImageUploadService::uploadImage($request->image, $path, get_catalog_image_size('product'), get_catalog_image_thumb_size('product'));
        }
        $productService->store($data);
        return redirect()->route('admin.catalog.product.index');
    }
}
