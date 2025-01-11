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
        Schema::create('agent_leads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agent_id')->index()->nullable();
            $table->string('name',100)->nullable();
            $table->string('email',100)->nullable();
            $table->string('phone',100)->nullable();
            $table->string('subject',100)->nullable();
            $table->string('message',100)->nullable();
            $table->unsignedBigInteger('property_id')->index()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_leads');
    }
};
