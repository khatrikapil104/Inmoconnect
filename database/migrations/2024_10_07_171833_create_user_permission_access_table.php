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
        Schema::create('user_permission_access', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->index()->nullable();
            // $table->foreign('user_id')->references('id')->on('projects')->onDelete('cascade');
            // $table->bigInteger('agent_id')->unsigned()->index()->nullable();
            // $table->foreign('agent_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('user_permission_id')->unsigned()->index()->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_permission_access');
    }
};
