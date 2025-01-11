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
            
            $table->integer('contact_tax_no')->nullable();
            $table->string('listed_as', 50)->nullable();
            $table->float('sale_price', 10, 2)->nullable();
            $table->float('percentage', 5, 2)->nullable();
            $table->float('commission', 10, 2)->nullable();
            $table->float('net_price', 10, 2)->nullable();
            $table->float('list_agent_per', 5, 2)->nullable();
            $table->float('list_agent_com', 10, 2)->nullable();
            $table->float('sell_agent_per', 5, 2)->nullable();
            $table->float('sell_agent_com', 10, 2)->nullable();
            $table->float('valuation', 10, 2)->nullable();
            $table->year('valuation_year')->nullable();
            $table->float('deed_value', 10, 2)->nullable();
            $table->float('mini_price', 10, 2)->nullable();
            $table->float('comm_fees', 10, 2)->nullable();
            $table->float('garbage_tax', 10, 2)->nullable();
            $table->float('ibi_fees', 10, 2)->nullable();
            $table->text('commission_note')->nullable();
            $table->string('dimension_type', 100)->nullable();
            $table->float('co2_emission', 10, 2)->nullable();
            $table->string('letter_co2', 10)->nullable();
            $table->float('energy_consumption', 10, 2)->nullable();
            $table->string('letter_energy', 10)->nullable();
            $table->string('contact_website', 100)->nullable();
            $table->string('owner_one', 50)->nullable();
            $table->string('owner_two', 50)->nullable();
            $table->string('key_holder', 100)->nullable();
            $table->string('developer', 100)->nullable();
            $table->string('key_status', 50)->nullable();
            $table->string('key_id', 50)->nullable();
            $table->text('key_details')->nullable();
            $table->text('private_note')->nullable();
            $table->string('lawyer', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn([
                'contact_tax_no',
                'listed_as',
                'sale_price',
                'percentage',
                'commission',
                'net_price',
                'list_agent_per',
                'list_agent_com',
                'sell_agent_per',
                'sell_agent_com',
                'valuation',
                'valuation_year',
                'deed_value',
                'mini_price',
                'comm_fees',
                'garbage_tax',
                'ibi_fees',
                'commission_note',
                'dimension_type',
                'co2_emission',
                'letter_co2',
                'energy_consumption',
                'letter_energy',
                'contact_website',
                'owner_one',
                'owner_two',
                'key_holder',
                'developer',
                'key_status',
                'key_id',
                'key_details',
                'private_note',
                'lawyer'
            ]);
        });
    }
};
