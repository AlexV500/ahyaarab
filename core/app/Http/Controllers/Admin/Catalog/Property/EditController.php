<?php

namespace App\Http\Controllers\Admin\Catalog\Property;

use App\Http\Controllers\Admin\Catalog\BaseController;
use Domain\Product\Models\Property;

class EditController extends BaseController{

    public function __invoke(Property $property){

        $addViewVariables = [
            'pageTitle' => 'Edit Property',
            'property' => $property,
        ];
        return view('admin.catalog.property.edit', $this->mergeViewVariables($addViewVariables));
    }
}
