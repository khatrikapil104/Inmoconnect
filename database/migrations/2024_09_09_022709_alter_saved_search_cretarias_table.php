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
        Schema::table('saved_search_cretarias', function (Blueprint $table) {
            $table->smallInteger('is_notifiable')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('saved_search_cretarias', function (Blueprint $table) {
            $table->dropColumn('is_notifiable');
        });
    }
};
