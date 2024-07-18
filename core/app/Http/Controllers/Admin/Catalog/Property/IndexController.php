<?php

namespace App\Http\Controllers\Admin\Catalog\Property;

use App\Http\Controllers\Admin\Catalog\BaseController;
use Domain\Catalog\ViewModels\Admin\PropertyViewModel;
use Domain\Product\Models\Property;

class IndexController extends BaseController{

    public function __invoke(?Property $property){

        $addViewVariables = [
            'pageTitle' => 'Manage Properties',
        ];
        return (new PropertyViewModel())->view('admin.catalog.property.index', $this->mergeViewVariables($addViewVariables));
    }
}
