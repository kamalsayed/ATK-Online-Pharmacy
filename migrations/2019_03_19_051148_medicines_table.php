<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Medicines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',100);
            $table->float('price');
            $table->date('produc_date');
            $table->date('expire_date');
            $table->string('brand',20);
            $table->integer('quantity');
            $table->string('type');
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
        Schema::dropIfExists('Medicines');
    }
}
