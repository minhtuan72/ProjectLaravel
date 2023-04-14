<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //loi nen tao table user_details_tmp. can sua thi sua o table user_details
            Schema::create('user_details_tmp', function (Blueprint $table) {
                //$table->increments('id');
                $table->integer('user_id')->unsigned();         //id user
                $table->string('location', 255)->nullable();    //vi tri hien tai
                $table->string('looking_for', 255)->nullable(); //nhu cau tim kiem
                $table->string('gender')->nullable();           //gioi tinh
                $table->integer('height')->nullable();          //chieu cao
                $table->integer('age')->nullable();             //tuoi
                $table->string('languages_spoken')->nullable();//ngon ngu noi
                $table->string('company')->nullable();          //noi lam viec
                $table->string('high_school')->nullable();      //truong cap 3
                $table->string('grad_school')->nullable();      //dai hoc
                $table->string('education_level')->nullable();  //trinh do hoc van
                $table->string('your_kids')->nullable();        //con cai
                $table->string('smoking')->nullable();          //hut thuoc
                $table->string('drinking')->nullable();         //uong ruou
                $table->string('religion')->nullable();         //ton giao
                $table->string('interests')->nullable();        //moi quan tam
               
                $table->timestamps();
                $table->softDeletes();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
