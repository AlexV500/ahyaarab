<?php

namespace App\Http\Controllers\Admin\Catalog\Product;

use App\Http\Controllers\Admin\Catalog\BaseController;
use App\Http\Requests\Admin\Catalog\Product\UpdateRequest;
use Domain\Product\Models\Product;
use Support\Services\ImageUploadService;
use Support\Services\ProductService;

class UpdateController extends BaseController{

    public function __invoke(UpdateRequest $request, Product $product){

        $data = $request->validated();
        $productService = app()->make(ProductService::class);
        if ($request->hasFile('image')) {
            $path  = 'assets/images/catalog/product';
            $data['image'] = ImageUploadService::uploadImage($request->image, $path, get_catalog_image_size('product'), get_catalog_image_thumb_size('product'), $product->image);
        }
        $productService->update($data, $product);
        return redirect()->route('admin.catalog.product.index');
    }
}
