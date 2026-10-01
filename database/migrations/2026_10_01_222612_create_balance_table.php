<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('app.balance', function (Blueprint $table) {
            $table->uuid('account_id');
            $table->text('asset_id');
            $table->decimal('quantity', 28, 8);

            $table->primary(['account_id', 'asset_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('app.balance');
    }
};
