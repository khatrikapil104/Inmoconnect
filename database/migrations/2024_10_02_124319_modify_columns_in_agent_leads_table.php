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
        Schema::table('agent_leads', function (Blueprint $table) {
            // Change the 'message' column to longText
            $table->longText('message')->nullable()->change();
            
            // Remove length constraint from 'subject'
            $table->string('subject')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agent_leads', function (Blueprint $table) {
            // Revert 'message' column back to string(100)
            $table->string('message', 100)->nullable()->change();
            
            // Revert 'subject' column back to string with length of 100
            $table->string('subject', 100)->nullable()->change();
        });
    }
};
