<?php

namespace App\Http\Controllers\Admin\Catalog\Category;

use App\Http\Controllers\Admin\Catalog\BaseController;
use App\Http\Requests\Admin\Catalog\Category\UpdateRequest;
use Domain\Catalog\Models\Category;
use Support\Services\ImageUploadService;

class UpdateController extends BaseController{

    public function __invoke(UpdateRequest $request, Category $category){

        $data = $request->validated();

        if ($request->hasFile('image')) {
            $path  = 'assets/images/catalog/category';
            $data['image'] = ImageUploadService::uploadImage($request->image, $path, '200x300', '100x100', $category->image);
        }

        $category->update($data);
        return redirect()->route('admin.catalog.category.index');
    }
}
