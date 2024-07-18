<?php

use Domain\Order\Models\Order;
use Domain\Product\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Order::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();


            $table->foreignIdFor(Product::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->unsignedInteger('price');

            $table->unsignedInteger('quantity');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        if (!app()->isProduction()) {
            Schema::dropIfExists('order_items');
        }
    }
};
