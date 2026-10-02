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
        Schema::table('coupons', function (Blueprint $table) {
            $table->decimal('discount_percentage_4th', 5, 2)->nullable()->after('discount_percentage_3rd');
            $table->decimal('discount_percentage_5th', 5, 2)->nullable()->after('discount_percentage_4th');
            $table->decimal('discount_percentage_6th', 5, 2)->nullable()->after('discount_percentage_5th');
            $table->decimal('discount_percentage_7th', 5, 2)->nullable()->after('discount_percentage_6th');
            $table->decimal('discount_percentage_8th', 5, 2)->nullable()->after('discount_percentage_7th');
            $table->decimal('discount_percentage_9th', 5, 2)->nullable()->after('discount_percentage_8th');
            $table->decimal('discount_percentage_10th', 5, 2)->nullable()->after('discount_percentage_9th');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('coupons', function (Blueprint $table) {
            $table->dropColumn([
                'discount_percentage_4th',
                'discount_percentage_5th',
                'discount_percentage_6th',
                'discount_percentage_7th',
                'discount_percentage_8th',
                'discount_percentage_9th',
                'discount_percentage_10th'
            ]);
        });
    }
};
