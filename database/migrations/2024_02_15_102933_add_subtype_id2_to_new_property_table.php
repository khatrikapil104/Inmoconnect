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
        Schema::table('new_property', function (Blueprint $table) {
            $table->bigInteger('subtype_id2')->unsigned()->index()->nullable();
            $table->foreign('subtype_id2')->references('id')->on('subtypes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('new_property', function (Blueprint $table) {
            //
        });
    }
};
