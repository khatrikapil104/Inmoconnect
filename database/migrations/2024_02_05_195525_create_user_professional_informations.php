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
        Schema::create('user_professional_informations', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->length(150)->nullable();
            $table->string('professional_title')->length(150)->nullable();
            $table->string('primary_service_area')->length(80)->nullable();
            $table->string('property_types_specialized')->length(150)->nullable();
            $table->string('property_specialization')->length(150)->nullable();
            $table->string('total_properties_in_portfolio')->length(150)->nullable();
            $table->string('total_years_experiance')->length(50)->nullable();
            $table->string('number_of_current_customers')->length(50)->nullable();
            $table->string('avg_number_properties_managed')->length(50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_professional_informations');
    }
};
