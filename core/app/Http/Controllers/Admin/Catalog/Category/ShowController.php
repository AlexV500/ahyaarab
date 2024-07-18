<?php

namespace App\Http\Controllers\Admin\Catalog\Category;

use App\Http\Controllers\Admin\Catalog\BaseController;
use Domain\Catalog\Models\Category;

class ShowController extends BaseController{

    public function __invoke(Category $category){

        $addViewVariables = [
            'category' => $category,
        ];
        return view('admin.catalog.category.show', $this->mergeViewVariables($addViewVariables));
    }
}
