<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;
use App\Traits\ViewVariables;
use Domain\Catalog\Models\Category;
use Domain\Product\Models\Product;
use Support\Services\PositionService;

class BaseController extends Controller
{
    use ViewVariables;

    public function __construct(public PositionService $positionService){
        parent::__construct();
    }

    public function checkCatalogSlug()
    {
        $returnValue = false;
        $category = Category::where('slug', request()->slug);
        $product = Product::where('slug', request()->slug);
        $exist['category'] = $category->exists();
        $exist['product'] = $product->exists();
        if($exist['category'] or $exist['product']){
            $returnValue = true;
        }
        return response()->json([
            'exists' => $returnValue,
        ]);
    }
}
