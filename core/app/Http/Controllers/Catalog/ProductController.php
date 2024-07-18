<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use Domain\Product\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{
    public function __invoke(Product $product): Factory|View|Application
    {
        $viewedProducts = [];

        session()->put('also.' . $product->id, $product->id);

        $also = Product::query()
            ->whereIn('id', session('also'))
            ->whereNot('id', $product->id)
            ->get();

        return view('product.show', [
            'product' => $product,
            'viewed' => $viewedProducts,
            'also' => $also
        ]);
    }
}
