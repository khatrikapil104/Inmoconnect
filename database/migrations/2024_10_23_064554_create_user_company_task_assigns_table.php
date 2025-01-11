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
        Schema::create('user_company_task_assigns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_task_id');
            $table->unsignedBigInteger('assign_to');            
            $table->unsignedBigInteger('assign_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_company_task_assigns');
    }
};
