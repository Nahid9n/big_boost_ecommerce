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
        Schema::create('delivery_boys', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation')->nullable();
            $table->text('image')->nullable();
            $table->string('email')->unique();
            $table->string('mobile')->unique();
            $table->string('blood')->nullable();
            $table->string('gender')->nullable();
            $table->string('date')->nullable();
            $table->text('present_address')->nullable();
            $table->text('permanentAddress')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('biography')->nullable();
            $table->string('experience')->nullable();
            $table->text('facebook')->unique();
            $table->text('twitter')->unique();
            $table->text('linkedIn')->unique();
            $table->text('website')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_boys');
    }
};
