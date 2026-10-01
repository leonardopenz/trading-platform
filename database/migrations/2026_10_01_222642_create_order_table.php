<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('app.order', function (Blueprint $table) {
            $table->uuid('order_id')->primary();
            $table->text('market_id');
            $table->uuid('account_id');
            $table->text('side');
            $table->decimal('quantity', 28, 8);
            $table->decimal('price', 28, 8);
            $table->decimal('fill_quantity', 28, 8)->default(0);
            $table->decimal('fill_price', 28, 8)->default(0);
            $table->text('status');
            $table->timestampTz('timestamp');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('app.order');
    }
};
