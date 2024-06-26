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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->index();
            $table->foreignId('product_id')->index();
            $table->integer('number')->unsigned();
            $table->decimal('amount', 20, 3)->unsigned();
            $table->decimal('delivery_amount', 20, 3)->unsigned()->default(0);
            $table->decimal('final_amount', 20, 3)->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
