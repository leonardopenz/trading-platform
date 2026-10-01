<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement('create schema if not exists app');
    }

    public function down(): void
    {
        DB::statement('drop schema if exists app cascade');
    }
};
