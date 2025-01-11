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
        Schema::create('project_task_assigns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_task_id');
            $table->unsignedBigInteger('assign_to');            
            $table->unsignedBigInteger('assign_by');
            $table->timestamps();

            $table->foreign('project_task_id')->references('id')->on('project_tasks');
            $table->foreign('assign_to')->references('id')->on('users');
            $table->foreign('assign_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_task_assigns');
    }
};
