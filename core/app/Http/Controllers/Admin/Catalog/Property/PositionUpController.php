<?php

namespace App\Http\Controllers\Admin\Catalog\Property;

use App\Http\Controllers\Admin\Catalog\BaseController;
use Domain\Product\Models\Property;

class PositionUpController extends BaseController{

    public function __invoke(Property $property){

        $this->positionService->positionUp($property);
        return redirect()->route('admin.catalog.property.index');
    }
}
