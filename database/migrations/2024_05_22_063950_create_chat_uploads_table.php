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
        Schema::create('chat_uploads', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('message_id')->unsigned()->index()->nullable();
            $table->foreign('message_id')->references('id')->on('messages')->onDelete('cascade');
            $table->bigInteger('document_id')->unsigned()->index()->nullable();
            $table->foreign('document_id')->references('id')->on('user_files')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_uploads');
    }
};
