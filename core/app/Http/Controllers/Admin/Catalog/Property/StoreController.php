<?php

namespace App\Http\Controllers\Admin\Catalog\Property;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Catalog\Property\StoreRequest;
use Domain\Product\Models\Property;

class StoreController extends Controller{

    public function __invoke(StoreRequest $request){

        $data = $request->validated();
        Property::firstOrCreate($data);
        return redirect()->route('admin.catalog.property.index');
    }
}
