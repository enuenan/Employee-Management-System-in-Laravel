<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->bigInteger('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('image')->nullable();
            $table->dateTime('dob');
            $table->string('sex');
            $table->string('desg');
            $table->string('department_id');
            $table->dateTime('join_date');
            $table->integer('total_leaves')->default(22);
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
