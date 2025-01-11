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
        Schema::create('user_company_tasks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->index()->nullable();
            // $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->string('task_name');
            $table->date('start_date');
            $table->date('end_date');
            $table->bigInteger('added_by')->unsigned()->index()->nullable();
            $table->string('status')->default('active')->comment('active , completed, pending')->nullable();
            $table->string('temp_status')->length(50)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_company_tasks');
    }
};
