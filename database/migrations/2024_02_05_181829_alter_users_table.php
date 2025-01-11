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
        Schema::table('users', function (Blueprint $table) {
            $table->string('current_status')->length(50)->nullable();
            $table->string('date_of_birth')->length(50)->nullable();
            $table->string('gender')->length(50)->nullable();
            $table->string('address')->length(50)->nullable();
            $table->string('city')->length(50)->nullable();
            $table->string('state')->length(80)->nullable();
            $table->string('country')->length(80)->nullable();
            $table->string('zipcode')->length(50)->nullable();
            $table->string('languages_spoken')->length(80)->nullable();
            $table->string('qualification_type')->length(50)->nullable();
            $table->string('field_of_study')->length(50)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['current_status', 'date_of_birth','gender','address','city','state','country','zipcode','languages_spoken','qualification_type','field_of_study']);
        });
    }
};
