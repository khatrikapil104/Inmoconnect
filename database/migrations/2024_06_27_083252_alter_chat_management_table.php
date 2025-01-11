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
        Schema::table('chat_management', function (Blueprint $table) {
            $table->bigInteger('action_to_group_id')->unsigned()->index()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chat_management', function (Blueprint $table) {
            $table->bigInteger('action_to_group_id')->unsigned()->index()->nullable();
        });
    }
};
