<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->string('title');
            $table->float('price_1')->comment('Розница');
            $table->float('price_2')->comment('до 30к');
            $table->float('price_3')->comment('30-50к');
            $table->float('price_4')->comment('от 50к');
            $table->float('price');
            $table->float('price');
            $table->float('price');
            $table->float('buy_price')->default(0);
            $table->text('description')->nullable();
            $table->longText('long_description')->nullable();
            $table->integer('remains')->default(0);
            $table->float('volume')->default(0.5)->comment('Объем одного товара');
            $table->string('volume_text')->default('л')->comment('Система исчисления объема');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
