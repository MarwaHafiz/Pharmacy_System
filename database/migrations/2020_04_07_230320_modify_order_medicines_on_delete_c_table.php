<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyOrderMedicinesOnDeleteCTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_medicines', function (Blueprint $table) {
            // $table->foreignId('order_id')->constrained()->onDelete('cascade')->change();
            // $table->foreignId('medicine_id')->constrained()->onDelete('cascade')->change();
            // $table->foreign('order_id')
            // ->references('id')->on('orders')
            // ->onDelete('cascade')
            // ->change();
            // $table->foreign('medicine_id')
            // ->references('id')->on('medicine')
            // ->onDelete('cascade')
            // ->change();
            // $table->unique(['order_id', 'medicine_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_medicines', function (Blueprint $table) {
            //
        });
    }
}
