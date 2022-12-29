<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('firstName');
            $table->string('lastName');
            $table->unsignedInteger('company');
            $table->string('email');
            $table->string('phone');
            $table->timestamps();

            $table->foreign('company')->references('id')->on('companies')->onDelete('cascade');

                        // // define foreign key
                        // $table->foreignId('category_id')
                        // ->constrained('categories')
                        // ->onUpdate('cascade')
                        // ->onDelete('cascade');
      
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
};
