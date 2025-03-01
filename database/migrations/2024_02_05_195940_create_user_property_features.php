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
        Schema::create('user_property_features', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('property_id')->unsigned()->index();
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
            $table->bigInteger('feature_id')->unsigned()->index();
            $table->foreign('feature_id')->references('id')->on('features')->onDelete('cascade');
            $table->smallInteger('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_property_features');
    }
};
