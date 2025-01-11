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
        Schema::create('chat_management', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('action_from')->unsigned()->index()->nullable();
            $table->bigInteger('action_to')->unsigned()->index()->nullable();
            $table->smallInteger('is_muted')->default(0);
            $table->smallInteger('is_blocked')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_management');
    }
};
