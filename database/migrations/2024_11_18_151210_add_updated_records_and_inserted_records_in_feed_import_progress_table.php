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
        Schema::table('feed_import_progress', function (Blueprint $table) {
            $table->integer('updated_records')->after('processed_records');
            $table->integer('inserted_records')->after('updated_records');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('feed_import_progress', function (Blueprint $table) {
            $table->dropColumn('updated_records');
            $table->dropColumn('inserted_records');
        });
    }
};
