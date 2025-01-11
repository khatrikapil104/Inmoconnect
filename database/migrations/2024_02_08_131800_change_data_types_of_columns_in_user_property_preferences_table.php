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
        Schema::table('user_property_preferences', function (Blueprint $table) {
            $table->integer('min_size')->default(0)->change();
            $table->integer('max_size')->default(0)->change();
            $table->integer('max_price')->default(0)->change();
            $table->integer('min_price')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_property_preferences', function (Blueprint $table) {
            $table->double('max_size')->change();
            $table->double('min_size')->change();
            $table->double('max_price')->change();
            $table->double('min_price')->change();
        });
    }
};
