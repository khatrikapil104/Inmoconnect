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
        Schema::table('user_permissions', function (Blueprint $table) {
            $table->smallInteger('is_agent_related_permission')->default(0);
            $table->smallInteger('is_developer_related_permission')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_permissions', function (Blueprint $table) {
            $table->dropColumn('is_agent_related_permission');
            $table->dropColumn('is_developer_related_permission');
        });
    }
};
