<?php

namespace App\Http\Controllers\Admin\Catalog\Property;

use App\Http\Controllers\Admin\Catalog\BaseController;
use Domain\Product\Models\Property;

class ShowController extends BaseController{

    public function __invoke(Property $property){

        $addViewVariables = [
            'property' => $property,
        ];
        return view('admin.catalog.property.show', $this->mergeViewVariables($addViewVariables));
    }
}
