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
        Schema::create('user_property_preferences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->bigInteger('category_id')->unsigned()->index()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->bigInteger('type_id')->unsigned()->index()->nullable();
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
            $table->bigInteger('situation_id')->unsigned()->index()->nullable();
            $table->foreign('situation_id')->references('id')->on('situations')->onDelete('cascade');
            $table->string('preferred_location')->length(80)->nullable();
            $table->float('max_size', 10, 2)->nullable();
            $table->float('min_size', 10, 2)->nullable();
            $table->float('min_price', 10, 2)->nullable();
            $table->float('max_price', 10, 2)->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_property_preferences');
    }
};
