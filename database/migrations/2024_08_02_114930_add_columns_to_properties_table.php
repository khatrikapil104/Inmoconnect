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
        Schema::table('properties', function (Blueprint $table) {
            $table->string('status_completion')->nullable()->after('bathrooms');
            $table->integer('year')->nullable()->after('status_completion');
            $table->string('month')->nullable()->before('year');
            $table->string('feeds')->nullable()->after('year');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn(['status_completion', 'year','month', 'feeds']);
        });
    }
};
