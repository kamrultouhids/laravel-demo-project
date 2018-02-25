<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppoinmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment', function (Blueprint $table) {
            $table->increments('appointment_id');
            $table->string('appointment_code');
            $table->string('patient_id');
            $table->string('centre_id');
            $table->date('appointment_date');
            $table->string('appointment_time');
            $table->string('physiotherapist_id');
            $table->integer('is_listed_patient')->nullable();
            $table->string('appointment_from')->nullable();
            $table->string('treatment_status')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
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
        Schema::dropIfExists('appointment');
    }
}
