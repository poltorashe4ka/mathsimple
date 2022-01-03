<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('model_year')->nullable();
            $table->decimal('car_cost',30,0)->nullable();
            $table->string('inital_pay')->nullable();
            $table->string('fio');
            $table->string('place_reg')->nullable();
            $table->integer('age')->nullable();
            $table->string('mobile_tel');
            $table->text('referer')->nullable();
            $table->text('additional_params')->nullable();
            $table->string('ip_address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('leads');
    }
}
