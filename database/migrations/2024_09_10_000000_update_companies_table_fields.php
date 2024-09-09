<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('logo')->nullable()->after('name');
            $table->string('website')->nullable()->after('logo');
            $table->text('description')->nullable()->after('website');
            $table->integer('founded_year')->nullable()->after('description');
            $table->string('headquarters')->nullable()->after('founded_year');
            $table->integer('employee_count')->nullable()->after('headquarters');
            $table->string('salary_range')->nullable()->after('employee_count');
            if (!Schema::hasColumn('companies', 'industry_id')) {
                $table->foreignUuid('industry_id')->nullable()->default(null)->after();
            }
        });
    }

    public function down() {
        // Check if columns exist before dropping
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('logo');
            $table->dropColumn('website');
            $table->dropColumn('description');
            $table->dropColumn('founded_year');
            $table->dropColumn('headquarters');
            $table->dropColumn('employee_count');
            $table->dropColumn('industry_id');
            $table->dropColumn('salary_range'); 
        });
    }
};