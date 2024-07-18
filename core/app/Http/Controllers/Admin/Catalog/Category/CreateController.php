<?php

namespace App\Http\Controllers\Admin\Catalog\Category;
use App\Http\Controllers\Admin\Catalog\BaseController;

class CreateController extends BaseController{

    public function __invoke(){

        $addViewVariables = [
            'pageTitle' => 'Create Category',
        ];

        return view('admin.catalog.category.create', $this->mergeViewVariables($addViewVariables));
    }
}
