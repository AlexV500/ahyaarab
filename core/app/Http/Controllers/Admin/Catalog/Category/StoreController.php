<?php

namespace App\Http\Controllers\Admin\Catalog\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Catalog\Category\StoreRequest;
use Domain\Catalog\Models\Category;
use Support\Services\ImageUploadService;

class StoreController extends Controller{

    public function __invoke(StoreRequest $request){

        $data = $request->validated();
        Category::firstOrCreate($data);
        if ($request->hasFile('image')) {
            $path  = 'assets/images/catalog/category';
            $data['image'] = ImageUploadService::uploadImage($request->image, $path, '200x300', '100x100');
        }
        return redirect()->route('admin.catalog.category.index');
    }
}
