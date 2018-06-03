<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('gender');
            $table->string('phone');
            $table->date('hire_date');
            $table->double('salary');
            $table->double('commission_pct');

            $table->unsignedInteger('manager_id');
            $table->unsignedInteger('department_id');
            $table->unsignedInteger('job_id');
            $table->unsignedInteger('company_id');

            $table->string('email')->unique();
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
        Schema::dropIfExists('employees');
    }
}
