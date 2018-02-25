<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('name');
            $table->integer('role_id')->unsigned();
            $table->text('centre_id')->nullable();
            $table->string('email',50)->unique();
            $table->integer('phone')->unique();
            $table->string('password',200);
            $table->tinyInteger('status')->default('1');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->string('avatar_file')->nullable();
            $table->text('address')->nullable();
            $table->text('profile')->nullable();
            $table->rememberToken();
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
        Schema::drop('user');
    }
}
