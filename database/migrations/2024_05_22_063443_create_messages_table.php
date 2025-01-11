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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('group_id')->unsigned()->index()->default(0);
            $table->bigInteger('message_id')->unsigned()->index()->default(0);
            $table->bigInteger('sender_id')->unsigned()->index()->default(0);
            $table->bigInteger('receiver_id')->unsigned()->index()->default(0);
            $table->longText('message')->nullable();
            $table->smallInteger('is_read')->default(0);
            $table->smallInteger('is_upload')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
