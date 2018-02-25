<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient', function (Blueprint $table) {
            $table->increments('patient_id');
            $table->integer('centre_id');
            $table->string('patient_name');
            $table->string('patient_code')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('patient_type')->nullable();
            $table->date('visit_date');
            $table->integer('phone_no');
            $table->integer('alternative_phone_no')->nullable();
            $table->date('birth_date')->nullable();
            $table->enum('sex', ['Male', 'Female','Other']);
            $table->string('blood_group')->nullable();
            $table->integer('profession_id')->nullable();
            $table->integer('referral_id')->nullable();
            $table->string('reference_name')->nullable();
            $table->string('patient_email')->nullable();
            $table->string('reference_email')->nullable();
            $table->integer('reference_phone')->nullable();
            $table->string('marketing_person')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('thana_id')->nullable();
            $table->string('location')->nullable();
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->enum('status', ['Active', 'Inactive']);
            $table->string('avatar_file')->nullable();
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
        Schema::dropIfExists('patient');
    }
}
