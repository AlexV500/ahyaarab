<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use Domain\Cart\Models\CartItem;
use Domain\Product\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(): Factory|View|Application
    {
        $pageTitle   = "Cart";
        $items = cart()->items();
        return view('Template::catalog.cart.index', compact('pageTitle', 'items'));
    }

    public function add()
    {
        $id = (int) request()->productId;
        $product = Product::find($id);
        cart()->add(
            $product,
            request('quantity', 1),
            request('options', [])
        );
        flash()->info('Товар добавлен в корзину');

        return response()->json([
            'product' => $product->title,
            'quantity' => cart()->count()
        ]);
    }

    public function quantity(CartItem $item): RedirectResponse
    {
        cart()->quantity($item, request('quantity', 1));

        flash()->info('Кол-во товаров изменено');

        return redirect()
            ->intended(route('cart'));
    }

    public function delete(CartItem $item): RedirectResponse
    {
        cart()->delete($item);

        flash()->info('Удалено из корзины');

        return redirect()
            ->intended(route('cart'));
    }

    public function truncate(): RedirectResponse
    {
        cart()->truncate();

        flash()->info('Корзина очищена');

        return redirect()
            ->intended(route('catalog'));
    }
}
