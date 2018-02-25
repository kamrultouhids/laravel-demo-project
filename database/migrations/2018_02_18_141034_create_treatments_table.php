<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatment', function (Blueprint $table) {
            $table->increments('treatment_id');
            $table->integer('patient_id');
            $table->string('service')->nullable();
            $table->string('consultant_id')->nullable()->comment("consultant id means physiotherapist id");
            $table->string('limb_involved')->nullable();
            $table->string('diagonsis')->nullable();
            $table->string('deformity_type')->nullable();
            $table->string('previous_treatment')->nullable();
            $table->string('treatment_given')->nullable();
            $table->string('session_complete')->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('treatment');
    }
}
