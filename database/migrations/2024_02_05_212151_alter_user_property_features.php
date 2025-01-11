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
        Schema::table('user_property_features', function (Blueprint $table) {
            // Drop the existing foreign key constraint
            $table->dropForeign(['property_id']);
            
            // Rename the column from property_id to user_id
            $table->renameColumn('property_id', 'user_id');

            // Add a new foreign key constraint
            $table->foreign('user_id')->references('id')->on('properties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_property_features', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['user_id']);

            // Rename the column back from user_id to property_id
            $table->renameColumn('user_id', 'property_id');

            // Add the foreign key constraint back
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
        });
    }
};
