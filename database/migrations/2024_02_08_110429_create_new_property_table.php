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
        Schema::create('new_property', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->unsigned()->index()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->bigInteger('type_id')->unsigned()->index()->nullable();
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
            $table->bigInteger('situation_id')->unsigned()->index()->nullable();
            $table->foreign('situation_id')->references('id')->on('situations')->onDelete('cascade');
            $table->bigInteger('subtype_id')->unsigned()->index()->nullable();
            $table->foreign('subtype_id')->references('id')->on('subtypes')->onDelete('cascade');
            $table->string('reference')->nullable();
            $table->longText('name');
            $table->float('price', 20, 2)->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->longText('description')->nullable();

            $table->string('street_number')->nullable();
            $table->longText('street_name')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('zipcode')->nullable();
            $table->longText('notes')->nullable();
            $table->longText('address')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();

            $table->integer('floors')->nullable();
            $table->integer('total_size')->nullable();
            $table->integer('plot_size')->nullable();
            $table->integer('built')->nullable();
            $table->integer('storeys')->nullable();
            $table->integer('no_of_properties_builtin')->nullable();
            $table->integer('terrace')->nullable();
            $table->integer('levels')->nullable();
            $table->integer('agency_ref')->nullable();
            $table->integer('garden_plot')->nullable();
            $table->integer('properties_int_floor_space')->nullable();

            $table->string('file')->nullable();
            $table->string('long_term_ref')->nullable();
            $table->string('short_term_ref')->nullable();
            $table->string('rental_license_ref')->nullable();
            $table->integer('nota_simple')->nullable();
            $table->integer('IBI_receipt')->nullable();
            $table->integer('first_occupancy_license_aFO')->nullable();
            
            $table->string('contact_name')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_mobile')->nullable();
            $table->string('contact_street_address')->nullable();
            $table->string('contact_city')->nullable();
            $table->string('contact_state_province')->nullable();
            $table->string('contact_country')->nullable();
            $table->string('contact_zipcode')->nullable();
            $table->string('company_name')->nullable();
            $table->smallInteger('is_active')->default(1);
            $table->softDeletes();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_property');
    }
};
