<?php

namespace App\Http\Controllers\Admin\Catalog\Product;

use App\Http\Controllers\Admin\Catalog\BaseController;
use Domain\Product\Models\Product;

class PositionDownController extends BaseController{

    public function __invoke(Product $product){

        $this->positionService->positionDown($product);
        return redirect()->route('admin.catalog.product.index');
    }
}
