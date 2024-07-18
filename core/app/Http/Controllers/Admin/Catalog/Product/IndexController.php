<?php

namespace App\Http\Controllers\Admin\Catalog\Product;

use App\Http\Controllers\Admin\Catalog\BaseController;
use Domain\Catalog\Models\Category;
use Domain\Catalog\ViewModels\Admin\ProductViewModel;

class IndexController extends BaseController{

    public function __invoke(Category $category){

        $addViewVariables = [
            'category' => $category,
            'pageTitle' => 'Manage Products',
        ];

        return (new ProductViewModel($category))->view('admin.catalog.product.index', $this->mergeViewVariables($addViewVariables));
    }
}
