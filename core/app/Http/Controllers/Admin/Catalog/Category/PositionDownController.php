<?php

namespace App\Http\Controllers\Admin\Catalog\Category;

use App\Http\Controllers\Admin\Catalog\BaseController;
use Domain\Catalog\Models\Category;

class PositionDownController extends BaseController{

    public function __invoke(Category $category){

        $this->positionService->positionDown($category);
        return redirect()->route('admin.catalog.category.index');
    }
}
