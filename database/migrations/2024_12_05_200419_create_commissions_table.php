<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commissions', function (Blueprint $table) {
            $table->id();
            $table->string('commission', 50);
            $table->decimal('percentage', 5, 2);
            $table->string('total_commission', 50);
            $table->date('agreement_start_date');
            $table->date('agreement_end_date');
            $table->text('additional_note')->nullable();


            $table->unsignedBigInteger('owner_id');
            $table->unsignedBigInteger('secondaryagent_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('property_id');


            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('secondaryagent_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commissions');
    }
}
