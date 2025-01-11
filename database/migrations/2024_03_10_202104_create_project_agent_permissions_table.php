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
        if (!Schema::hasTable('project_agent_permissions')) {
            Schema::create('project_agent_permissions', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('project_id')->unsigned()->index()->nullable();
                $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
                $table->bigInteger('agent_id')->unsigned()->index()->nullable();
                $table->foreign('agent_id')->references('id')->on('users')->onDelete('cascade');
                $table->bigInteger('permission_id')->unsigned()->index()->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_agent_permissions');
    }
};
