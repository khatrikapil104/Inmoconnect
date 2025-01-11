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
        Schema::create('development_floor_plans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('development_id')->unsigned()->index();
            // $table->foreign('development_id')->references('id')->on('properties')->onDelete('cascade');
            $table->string('image');
            $table->string('type')->nullable();
            $table->smallInteger('is_active')->default(1);
         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('development_floor_plans');
    }
};
