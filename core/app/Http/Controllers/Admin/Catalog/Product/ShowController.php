<?php

namespace App\Http\Controllers\Admin\Catalog\Product;

use App\Http\Controllers\Admin\Catalog\BaseController;
use Domain\Catalog\Models\Category;
use Domain\Product\Models\Product;

class ShowController extends BaseController{

    public function __invoke(Category $category, Product $product){

        $addViewVariables = [
            'pageTitle' => 'Product',
            'category' => $category,
        ];
        return view('admin.catalog.product.show', $this->mergeViewVariables($addViewVariables));
    }
}
