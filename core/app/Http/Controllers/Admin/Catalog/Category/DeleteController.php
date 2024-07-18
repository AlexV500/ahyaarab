<?php

namespace App\Http\Controllers\Admin\Catalog\Category;

use App\Http\Controllers\Controller;
use Domain\Catalog\Models\Category;
use Support\Services\ImageUploadService;

class DeleteController extends Controller{

    public function __invoke(Category $category){
        $path  = 'assets/images/catalog/category';
        ImageUploadService::removeFile($path , $category['image']);
        $category->delete();
        return redirect()->route('admin.catalog.category.index');
    }
}
