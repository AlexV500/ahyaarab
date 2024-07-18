<?php

namespace App\Http\Controllers\Admin\Catalog\Property;

use App\Http\Controllers\Admin\Catalog\BaseController;
use App\Http\Requests\Admin\Catalog\Property\UpdateRequest;
use Domain\Product\Models\Property;

class UpdateController extends BaseController{

    public function __invoke(UpdateRequest $request, Property $property)
    {
        $data = $request->validated();
        $property->update($data);
        return redirect()->route('admin.catalog.property.index');
    }
}
