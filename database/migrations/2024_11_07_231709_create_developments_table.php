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
        Schema::create('developments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('development_id')->unsigned()->index()->nullable();
            $table->string('development_name')->nullable();
            $table->string('cadastral_reference')->nullable();
            $table->string('temp_status')->nullable();
            $table->string('building_license')->nullable();
            $table->string('start_date')->length(20)->nullable();
            $table->string('end_date')->length(20)->nullable();
            $table->float('min_selling_price', 10, 2)->default(0.00);
            $table->float('max_selling_price', 10, 2)->default(0.00);
            $table->integer('agent_commission_per')->default(0);
            $table->string('brochure')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('legal_document')->nullable();
            $table->string('location')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('status')->length(50)->comment('under_construction,running_late');
            $table->smallInteger('open_for_collaboration')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('developments');
    }
};
