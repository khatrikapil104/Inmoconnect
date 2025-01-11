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
        Schema::table('property_features', function (Blueprint $table) {
            $table->bigInteger('sub_feature_id')->unsigned()->index(); 
            // $table->foreign('sub_feature_id')->references('id')->on('sub_features')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('property_features', function (Blueprint $table) {
            //
        });
    }
};
