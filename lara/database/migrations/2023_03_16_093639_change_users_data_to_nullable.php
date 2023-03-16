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
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->nullable()->change();
            $table->string('phone_code', 8)->nullable()->change();
            $table->string('phone', 32)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->nullable(false)->change();
            $table->string('phone_code', 8)->nullable(false)->change();
            $table->string('phone', 32)->nullable(false)->change();
        });
    }
};
