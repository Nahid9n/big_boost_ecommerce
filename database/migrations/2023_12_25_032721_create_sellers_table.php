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
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
             $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone');
            $table->string('gender');
            $table->date('DOB');
            $table->string('shop_name');
            $table->string('address');
            $table->date('join_date');
            $table->string('status')->default('1');
            $table->string('added_by')->nullable();
            $table->string('image')->nullable();

            $table->string('token')->nullable();
            $table->dateTime('token_expired_at')->nullable();
            $table->string('otp',10)->nullable();
            $table->string('otp_expired_at')->nullable();
            $table->timestamp('mobile_verified_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();

            $table->foreignId('role_id')->default(0);
            $table->string('role')->default('seller');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sellers');
    }
};
