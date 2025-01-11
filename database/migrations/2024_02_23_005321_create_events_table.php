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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('owner_id')->unsigned()->index()->nullable();
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('action', 50);
            $table->bigInteger('project_id')->unsigned()->index()->nullable();
            $table->string('event_name');
            $table->longText('event_description')->nullable();
            $table->string('priority', 50)->nullable();
            $table->integer('reminder')->nullable();
            $table->date('due_date');
            $table->time('start_from');
            $table->time('end_to');
            $table->smallInteger('is_active')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
