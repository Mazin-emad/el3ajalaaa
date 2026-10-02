<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Update users table
        Schema::table('users', function (Blueprint $table) {
            $table->string('national_id')->nullable()->unique()->after('email');
            $table->string('phone')->nullable()->unique()->after('national_id');
        });

        // 2. Update coupons table
        Schema::table('coupons', function (Blueprint $table) {
            $table->string('code')->nullable()->unique()->after('title');
            $table->integer('discount_percentage')->default(100)->after('code');
            $table->integer('discount_percentage_2nd')->nullable()->after('discount_percentage');
            $table->integer('discount_percentage_3rd')->nullable()->after('discount_percentage_2nd');
            $table->boolean('applies_to_all_assessments')->default(true)->after('discount_percentage_3rd');
        });

        // 3. Update assessments table
        Schema::table('assessments', function (Blueprint $table) {
            $table->boolean('hide_coupon_field')->default(false)->after('is_active');
        });

        // 4. Update exam_sessions table
        Schema::table('exam_sessions', function (Blueprint $table) {
            $table->unsignedBigInteger('coupon_id')->nullable()->after('assessment_id');
            $table->integer('discount_applied')->nullable()->after('coupon_id');
        });

        // 5. Create coupon_assessment pivot table
        Schema::create('coupon_assessment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coupon_id');
            $table->uuid('assessment_id');
            $table->timestamps();

            $table->unique(['coupon_id', 'assessment_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coupon_assessment');

        Schema::table('exam_sessions', function (Blueprint $table) {
            $table->dropColumn(['coupon_id', 'discount_applied']);
        });

        Schema::table('assessments', function (Blueprint $table) {
            $table->dropColumn('hide_coupon_field');
        });

        Schema::table('coupons', function (Blueprint $table) {
            $table->dropColumn([
                'code',
                'discount_percentage',
                'discount_percentage_2nd',
                'discount_percentage_3rd',
                'applies_to_all_assessments'
            ]);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['national_id', 'phone']);
        });
    }
};
