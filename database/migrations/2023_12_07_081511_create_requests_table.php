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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->foreign('to')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('to')->unsigned()->index()->nullable();
            $table->foreign('from')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('from')->unsigned()->index()->nullable();
            $table->bigInteger('status')->default(1)->comment('1 = pending , 2 = accepted, 3 = rejected , 4 = blocked');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
