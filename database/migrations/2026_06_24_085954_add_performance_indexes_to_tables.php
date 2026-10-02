<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('recommendations', function (Blueprint $table) {
            $table->unique(['assessment_id', 'level'], 'recommendations_assessment_level_unique');
        });

        Schema::table('dimensions', function (Blueprint $table) {
            $table->index(['assessment_id', 'order_index'], 'dimensions_assessment_order_index');
        });

        Schema::table('questions', function (Blueprint $table) {
            $table->index(['assessment_id', 'order_index'], 'questions_assessment_order_index');
            $table->index(['dimension_id', 'order_index'], 'questions_dimension_order_index');
        });

        Schema::table('answer_options', function (Blueprint $table) {
            $table->index(['question_id', 'order_index'], 'answer_options_question_order_index');
        });
    }

    public function down(): void
    {
        Schema::table('recommendations', function (Blueprint $table) {
            $table->dropUnique('recommendations_assessment_level_unique');
        });

        Schema::table('dimensions', function (Blueprint $table) {
            $table->dropIndex('dimensions_assessment_order_index');
        });

        Schema::table('questions', function (Blueprint $table) {
            $table->dropIndex('questions_assessment_order_index');
            $table->dropIndex('questions_dimension_order_index');
        });

        Schema::table('answer_options', function (Blueprint $table) {
            $table->dropIndex('answer_options_question_order_index');
        });
    }
};
