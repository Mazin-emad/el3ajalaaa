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
        Schema::table('assessments', function (Blueprint $table) {
            $table->text('certificates_ar')->nullable()->after('description_ar');
            $table->text('programs_ar')->nullable()->after('certificates_ar');
            $table->text('plan_30_days_ar')->nullable()->after('programs_ar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assessments', function (Blueprint $table) {
            $table->dropColumn(['certificates_ar', 'programs_ar', 'plan_30_days_ar']);
        });
    }
};
