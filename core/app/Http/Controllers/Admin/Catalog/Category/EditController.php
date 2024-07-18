<?php

namespace App\Http\Controllers\Admin\Catalog\Category;

use App\Http\Controllers\Admin\Catalog\BaseController;
use Domain\Catalog\Models\Category;
use Support\Services\ImageUploadService;

class EditController extends BaseController{

    public function __invoke(Category $category){

        $path  = get_catalog_image_path('category');
        $imageSize = get_catalog_image_size('category');

        $addViewVariables = [
            'pageTitle' => 'Edit Category',
            'category' => $category,
            'imagePath' => ImageUploadService::getImage($path.'/'.$category->image),
            'imageSize' => $imageSize
        ];
        return view('admin.catalog.category.edit', $this->mergeViewVariables($addViewVariables));
    }
}
