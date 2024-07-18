<?php

namespace App\Http\Controllers\Admin\Catalog\Product;

use App\Http\Controllers\Controller;
use Domain\Product\Models\Product;

class DeleteController extends Controller{

    public function __invoke(Product $product){

        $product->delete();
        return redirect()->route('admin.catalog.product.index');
    }
}
