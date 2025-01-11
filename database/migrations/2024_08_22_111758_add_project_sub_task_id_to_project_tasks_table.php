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
        Schema::table('project_tasks', function (Blueprint $table) {
            $table->unsignedBigInteger('task_id')->after('project_id')->nullable();
            $table->unsignedBigInteger('sub_task_id')->after('task_id')->nullable();
            $table->foreign('task_id')->references('id')->on('task_types');
            $table->foreign('sub_task_id')->references('id')->on('task_sub_types');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_tasks', function (Blueprint $table) {
            //
        });
    }
};
