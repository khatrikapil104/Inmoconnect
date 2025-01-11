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
        Schema::table('project_agents', function (Blueprint $table) {
            $table->smallInteger('is_project_owner')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_agents', function (Blueprint $table) {
            $table->dropColumn(['is_project_owner']);
        });
    }
};
