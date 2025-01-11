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
        Schema::create('property_documents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('property_id')->unsigned()->index()->nullable();
            $table->foreign('property_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('document');
            $table->string('original_name')->nullable();
            $table->string('type')->length(50)->nullable();
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
        Schema::dropIfExists('property_documents');
    }
};
