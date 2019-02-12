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
            $table->string('lastname', 60);
            $table->string('firstname', 60);
            $table->string('middlename', 60);
            $table->string('address', 120);
            $table->integer('city')->unsigned();
            $table->foreign('city')
                  ->references('id')->on('cities')
                  ->onDelete('cascade');
            $table->integer('state')->unsigned();
            $table->foreign('state')
                  ->references('id')->on('states')
                  ->onDelete('cascade');
            $table->integer('country')->unsigned();
            $table->foreign('country')
                  ->references('id')->on('countries')
                  ->onDelete('cascade');
            $table->char('zip', 10);
            $table->integer('age');
            $table->date('birthdate');
            $table->date('date_hired');
            $table->integer('department')->unsigned();
            $table->foreign('department')
                  ->references('id')->on('departments')
                  ->onDelete('cascade');
            $table->integer('division')->unsigned();
            $table->foreign('division')
                  ->references('id')->on('divisions')
                  ->onDelete('cascade');
            $table->integer('company')->unsigned();
            $table->foreign('company')
                  ->references('id')->on('companies')
                  ->onDelete('cascade');
            $table->string('picture', 60);
            $table->timestamps();
            $table->softDeletes();
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
