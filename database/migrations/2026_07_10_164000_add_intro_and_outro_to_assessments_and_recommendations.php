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
            $table->text('programs_intro_ar')->nullable()->after('description_ar');
            $table->text('programs_outro_ar')->nullable()->after('programs_intro_ar');
        });

        Schema::table('recommendations', function (Blueprint $table) {
            $table->text('programs_intro_ar')->nullable()->after('programs_ar');
            $table->text('programs_outro_ar')->nullable()->after('programs_intro_ar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recommendations', function (Blueprint $table) {
            $table->dropColumn(['programs_intro_ar', 'programs_outro_ar']);
        });

        Schema::table('assessments', function (Blueprint $table) {
            $table->dropColumn(['programs_intro_ar', 'programs_outro_ar']);
        });
    }
};
