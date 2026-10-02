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
        // Add to recommendations
        Schema::table('recommendations', function (Blueprint $table) {
            $table->text('certificates_ar')->nullable()->after('description_ar');
            $table->text('plan_30_days_ar')->nullable()->after('programs_outro_ar');
        });

        // Drop from assessments
        Schema::table('assessments', function (Blueprint $table) {
            if (Schema::hasColumn('assessments', 'certificates_ar')) {
                $table->dropColumn('certificates_ar');
            }
            if (Schema::hasColumn('assessments', 'programs_ar')) {
                $table->dropColumn('programs_ar');
            }
            if (Schema::hasColumn('assessments', 'programs_intro_ar')) {
                $table->dropColumn('programs_intro_ar');
            }
            if (Schema::hasColumn('assessments', 'programs_outro_ar')) {
                $table->dropColumn('programs_outro_ar');
            }
            if (Schema::hasColumn('assessments', 'plan_30_days_ar')) {
                $table->dropColumn('plan_30_days_ar');
            }
            if (Schema::hasColumn('assessments', 'roadmap_ar')) {
                $table->dropColumn('roadmap_ar');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assessments', function (Blueprint $table) {
            $table->text('certificates_ar')->nullable();
            $table->text('programs_ar')->nullable();
            $table->text('programs_intro_ar')->nullable();
            $table->text('programs_outro_ar')->nullable();
            $table->text('plan_30_days_ar')->nullable();
            $table->text('roadmap_ar')->nullable();
        });

        Schema::table('recommendations', function (Blueprint $table) {
            $table->dropColumn(['certificates_ar', 'plan_30_days_ar']);
        });
    }
};
