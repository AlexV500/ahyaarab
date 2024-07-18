<?php

namespace App\Http\Controllers\Admin\Catalog\Product;
use App\Http\Controllers\Admin\Catalog\BaseController;
use Domain\Catalog\Models\Category;
use Domain\Product\Models\Property;

class CreateController extends BaseController{

    public function __invoke(){

        $addViewVariables = [
            'pageTitle' => 'Create Product',
            'categories' => Category::get(),
            'properties' => Property::get(),
        ];

        return view('admin.catalog.product.create', $this->mergeViewVariables($addViewVariables));
    }
}
