<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('recommendations', function (Blueprint $table) {
            if (!Schema::hasColumn('recommendations', 'title_ar')) {
                $table->string('title_ar')->nullable()->after('level');
            }
            if (!Schema::hasColumn('recommendations', 'strengths_ar')) {
                $table->text('strengths_ar')->nullable()->after('description_ar');
            }
            if (!Schema::hasColumn('recommendations', 'development_areas_ar')) {
                $table->text('development_areas_ar')->nullable()->after('strengths_ar');
            }
            if (!Schema::hasColumn('recommendations', 'how_to_learn_ar')) {
                $table->text('how_to_learn_ar')->nullable()->after('development_areas_ar');
            }
            if (!Schema::hasColumn('recommendations', 'practical_tips_ar')) {
                $table->text('practical_tips_ar')->nullable()->after('how_to_learn_ar');
            }
        });
    }

    public function down(): void
    {
        Schema::table('recommendations', function (Blueprint $table) {
            $table->dropColumn([
                'title_ar',
                'strengths_ar',
                'development_areas_ar',
                'how_to_learn_ar',
                'practical_tips_ar'
            ]);
        });
    }
};
