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
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('biz_id')->constrained('biz');
            $table->string('title', 128);
            $table->text('description');
            $table->string('address', 128);
            $table->integer('min_salary', 64)->nullable()->autoIncrement(false);
            $table->integer('max_salary', 64)->autoIncrement(false);
            $table->string('salary_rate', 16);
            $table->integer('hire_count', 16)->autoIncrement(false);
            $table->string('employment_type', 64);
            $table->string('status', 32);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
