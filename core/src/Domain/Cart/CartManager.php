<?php

namespace Domain\Cart;

use Domain\Cart\Contracts\CartIdentityStorageContract;
use Domain\Cart\Models\Cart;
use Domain\Cart\Models\CartItem;
use Domain\Cart\StorageIdentities\FakeIdentityStorage;
use Domain\Product\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Support\ValueObjects\Price;

class CartManager
{
    public function __construct(
        protected CartIdentityStorageContract $identityStorage
    )
    {
    }

    public static function fake(): void
    {
        app()->bind(CartIdentityStorageContract::class, FakeIdentityStorage::class);
    }

    public function updateStorageId(string $old, string $current): void
    {
        Cart::query()
            ->where('storage_id', $old)
            ->update($this->storedData($current));
    }

    private function storedData(string $id): array
    {
        $data = [
            'storage_id' => $id
        ];

        if (auth()->check()) {
            $data['user_id'] = auth()->id();
        }

        return $data;
    }

    public function add(Product $product, int $quantity = 1): Model|Builder
    {
        $cart = Cart::query()
            ->updateOrCreate([
                'storage_id' => $this->identityStorage->get()
            ], $this->storedData($this->identityStorage->get()));

        $cartItem = $cart->cartItems()->updateOrCreate([
            'product_id' => $product->getKey(),
        ], [
            'price' => $product->price,
            'quantity' => 1,
            //   'quantity' => DB::raw("quantity + $quantity"),
        ]);

        $this->forgetCache();

        return $cart;
    }

    public function get()
    {
       // dd($this->identityStorage->get());

        return Cache::remember($this->cacheKey(), now()->addHour(), function () {
            return Cart::query()
                ->with('cartItems')
                ->where('storage_id', $this->identityStorage->get())
                ->when(auth()->check(), fn(Builder $query) => $query->orWhere('user_id', auth()->id()))
                ->first() ?? false;
        });
    }

    private function cacheKey(): string
    {
        return str('cart_' . $this->identityStorage->get())
            ->slug('_')
            ->value();
    }

    public function cartItems(): Collection
    {
        if (!$this->get()) {
            return collect();
        }

        return $this->get()->cartItems;
    }


    private function forgetCache(): void
    {
        Cache::forget($this->cacheKey());
    }

    public function quantity(CartItem $item, int $quantity = 1): void
    {
        $item->update([
            'quantity' => $quantity
        ]);

        $this->forgetCache();
    }

    public function truncate(): void
    {
        if ($this->get()) {
            $this->get()->delete();
        }

        $this->forgetCache();
    }

    public function delete(CartItem $item): void
    {
        $item->delete();

        $this->forgetCache();
    }

    public function items(): Collection
    {
        if (!$this->get()) {
            return collect();
        }

        return CartItem::query()
            ->with(['product'])
            ->whereBelongsTo($this->get())
            ->get();
    }

    public function count(): int
    {
        return $this->cartItems()->sum(fn(CartItem $item) => $item->quantity);
    }

    public function amount($showCurrency = true): Price
    {
        return Price::make(
            $this->cartItems()->sum(fn(CartItem $item) => $item->amount->raw()), $showCurrency
        );
    }
}
