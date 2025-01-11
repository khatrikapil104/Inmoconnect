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
         // Drop foreign keys
         Schema::table('user_property_preferences', function (Blueprint $table) {
            $table->dropForeign(['type_id']);
            $table->dropForeign(['situation_id']);
        });

        // Drop columns
        Schema::table('user_property_preferences', function (Blueprint $table) {
            $table->dropColumn(['type_id', 'situation_id']);
        });

        // Add new columns with desired data types
        Schema::table('user_property_preferences', function (Blueprint $table) {
            $table->string('type_id', 100)->nullable();
            $table->string('situation_id', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         // Drop foreign keys
         Schema::table('user_property_preferences', function (Blueprint $table) {
            $table->dropForeign(['type_id']);
            $table->dropForeign(['situation_id']);
        });

        // Drop new columns
        Schema::table('user_property_preferences', function (Blueprint $table) {
            $table->dropColumn(['type_id', 'situation_id']);
        });

        // Add back old columns with original data types
        Schema::table('user_property_preferences', function (Blueprint $table) {
            $table->string('type_id')->nullable();
            $table->string('situation_id')->nullable();
        });

        // Re-add foreign keys if needed
        Schema::table('user_property_preferences', function (Blueprint $table) {
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
            $table->foreign('situation_id')->references('id')->on('situations')->onDelete('cascade');
        });
    }
};
