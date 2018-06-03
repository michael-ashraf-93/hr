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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('gender');
            $table->string('role');
            $table->string('phone')->unique();
            $table->date('hire_date')->nullable();
            $table->double('salary')->nullable();
            $table->double('commission_pct')->nullable();

            $table->unsignedInteger('manager_id')->nullable();
            $table->unsignedInteger('department_id')->nullable();
            $table->unsignedInteger('job_id')->nullable();
            $table->unsignedInteger('company_id');

            $table->string('email')->unique();
            $table->string('password');
//            $table->foreign('manager_id')->references('id')->on('users');
//            $table->foreign('department_id')->references('id')->on('departments');
//            $table->foreign('job_id')->references('id')->on('jobs');

            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
