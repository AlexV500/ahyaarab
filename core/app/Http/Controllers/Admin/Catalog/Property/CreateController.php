<?php

namespace App\Http\Controllers\Admin\Catalog\Property;
use App\Http\Controllers\Admin\Catalog\BaseController;

class CreateController extends BaseController{

    public function __invoke(){

        $addViewVariables = [
            'pageTitle' => 'Create Property',
        ];

        return view('admin.catalog.property.create', $this->mergeViewVariables($addViewVariables));
    }
}
