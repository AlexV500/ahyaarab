<?php

namespace App\Http\Controllers\Admin\Catalog\Category;

use App\Http\Controllers\Admin\Catalog\BaseController;
use Domain\Catalog\Models\Category;
use Domain\Catalog\ViewModels\Admin\CategoryViewModel;

class IndexController extends BaseController{

    public function __invoke(?Category $category){

        $addViewVariables = [
            'pageTitle' => 'Manage Catalog',
        ];

        return (new CategoryViewModel($category))->view('admin.catalog.category.index', $this->mergeViewVariables($addViewVariables));
    }
}
