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
        Schema::create('user_company_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index()->nullable();
            $table->string('company_name',100)->nullable();
            $table->string('company_email',100)->unique()->nullable();
            $table->string('company_mobile',15)->nullable();
            $table->string('company_tax_number')->nullable();
            $table->string('company_website')->nullable();
            $table->string('company_address')->nullable();
            $table->string('company_city',100)->nullable();
            $table->string('company_sate',100)->nullable();
            $table->string('company_country',100)->nullable();
            $table->string('company_zipcode',100)->nullable();
            $table->string('company_image')->nullable();
            $table->string('primary_service_area')->nullable();
            $table->string('professional_title')->nullable();
            $table->string('property_types_specialized')->nullable();
            $table->string('company_sub_agent',20)->nullable();
            $table->string('total_properties_in_portfolio')->nullable();
            $table->string('total_years_experiance',20)->nullable();
            $table->string('number_of_current_customers',20)->nullable();
            $table->string('avg_number_properties_managed',20)->nullable();
            $table->string('property_specialization')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_company_details');
    }
};
