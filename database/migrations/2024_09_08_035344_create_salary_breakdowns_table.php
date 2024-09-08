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
        Schema::create('salary_breakdowns', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->decimal('base_salary', 15, 2);
            $table->decimal('bonus', 15, 2)->nullable();
            $table->decimal('stock', 15, 2)->nullable();
            $table->json('benefits')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salary_breakdowns');
    }
};
