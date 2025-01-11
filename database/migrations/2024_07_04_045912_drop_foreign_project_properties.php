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
        Schema::table('project_properties', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['property_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_properties', function (Blueprint $table) {
            // Add the foreign key constraint back
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
        });
    }
};
