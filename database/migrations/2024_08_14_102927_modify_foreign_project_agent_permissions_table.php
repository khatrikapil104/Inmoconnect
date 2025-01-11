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
        Schema::table('project_agent_permissions', function (Blueprint $table) {
            // Drop the foreign key constraint and add again
            $table->dropForeign(['agent_id']);
            $table->foreign('agent_id')->references('id')->on('project_agents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_agent_permissions', function (Blueprint $table) {
            // Add the foreign key constraint back
            $table->foreign('agent_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
};
