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
        Schema::create('salaries', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('location_id')->constrained();
            $table->foreignUuid('company_id')->constrained();
            $table->foreignUuid('industry_id')->constrained();
            $table->foreignUuid('experience_id')->nullable()->constrained('experience_levels');
            $table->string('title');
            $table->decimal('base_salary', 15, 2);
            $table->decimal('total_yearly_compensation', 15, 2)->nullable();
            $table->decimal('stock_grant_value', 15, 2)->nullable();
            $table->decimal('bonus', 15, 2)->nullable();
            $table->integer('years_of_experience')->nullable();
            $table->integer('years_at_company')->nullable();
            $table->string('education_level')->nullable();
            $table->string('gender')->nullable();
            $table->string('race')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->string('verification_token')->nullable();
            $table->text('additional_comments')->nullable();
            $table->timestamp('posted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};
