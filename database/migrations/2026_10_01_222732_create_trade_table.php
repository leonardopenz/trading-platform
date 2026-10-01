<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('app.trade', function (Blueprint $table) {
            $table->uuid('trade_id')->primary();
            $table->text('market_id');
            $table->uuid('buy_order_id');
            $table->uuid('sell_order_id');
            $table->text('side');
            $table->decimal('quantity', 28, 8);
            $table->decimal('price', 28, 8);
            $table->timestampTz('timestamp');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('app.trade');
    }
};
