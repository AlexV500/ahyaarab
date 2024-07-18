<?php

namespace App\Http\Controllers\Admin\Catalog\Property;

use App\Http\Controllers\Controller;
use Domain\Product\Models\Property;

class DeleteController extends Controller{

    public function __invoke(Property $property){

        $property->delete();
        return redirect()->route('admin.catalog.property.index');
    }
}
