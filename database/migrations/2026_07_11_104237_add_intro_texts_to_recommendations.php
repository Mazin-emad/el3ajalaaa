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
        Schema::table('recommendations', function (Blueprint $table) {
            $table->text('certificates_intro_ar')->nullable()->after('certificates_ar');
            $table->text('plan_30_days_intro_ar')->nullable()->after('programs_outro_ar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recommendations', function (Blueprint $table) {
            $table->dropColumn(['certificates_intro_ar', 'plan_30_days_intro_ar']);
        });
    }
};
