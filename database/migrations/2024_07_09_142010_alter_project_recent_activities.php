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
        Schema::table('project_recent_activities', function (Blueprint $table) {
            $table->string('type')->length(50)->comment('project_information,property_management,agent_management,customer_management','todo_list','attachment','event');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_recent_activities', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
};
