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
        Schema::table('user_professional_informations', function (Blueprint $table) {
            // Check if the user_id column doesn't exist
            if (!Schema::hasColumn('user_professional_informations', 'user_id')) {
                $table->bigInteger('user_id')->unsigned()->index()->nullable();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_professional_informations', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id']);

           
        });
    }
};