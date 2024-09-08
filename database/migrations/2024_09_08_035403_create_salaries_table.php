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
            $table->foreignUuid('role_id')->constrained();
            $table->foreignUuid('location_id')->constrained();
            $table->foreignUuid('company_id')->constrained();
            $table->foreignUuid('industry_id')->constrained();
            $table->foreignUuid('experience_id')->constrained('experience_levels');
            $table->foreignUuid('salary_breakdown_id')->constrained();
            $table->string('title');
            $table->decimal('total_yearly_compensation', 15, 2);
            $table->decimal('base_salary', 15, 2);
            $table->decimal('stock_grant_value', 15, 2)->nullable();
            $table->decimal('bonus', 15, 2)->nullable();
            $table->integer('years_of_experience');
            $table->integer('years_at_company');
            $table->string('education_level');
            $table->string('gender')->nullable();
            $table->string('race')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->text('additional_comments')->nullable();
            $table->uuid('comment_id')->nullable();
            $table->timestamp('posted_at')->useCurrent();
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
