<?php

use App\Enums\OrderStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');

            $table->string('full_name');
            $table->text('comment');
            $table->enum('status', OrderStatus::values());
            $table->double('amount');
            $table->double('total_price');


            $table->string('product_name');
            $table->string('product_category');
            $table->double('product_price', 12, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
