<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('app.account', function (Blueprint $table) {
            $table->uuid('account_id')->primary();
            $table->text('name');
            $table->text('email');
            $table->text('document');
            $table->text('password');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('app.account');
    }
};
