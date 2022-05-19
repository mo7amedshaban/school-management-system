<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('E_mail')->unique();
            $table->string('P_assword');
            $table->string('T_Name');
            $table->bigInteger('S_id')->unsigned();
            $table->foreign('S_id')->references('id')->on('specializations')->onDelete('cascade');
            $table->bigInteger('G_id')->unsigned();
            $table->foreign('G_id')->references('id')->on('genders')->onDelete('cascade');
            $table->date('Enroll_Date');
            $table->text('T_Address');
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
        Schema::dropIfExists('teachers');
    }
}
