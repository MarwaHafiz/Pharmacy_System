<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyOrderMedicinesOnDeleteCasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_medicines', function (Blueprint $table) {
            // $table->dropColumn('order_id');
            // $table->dropColumn('medicine_id');
            // $table->foreignId('order_id')->constrained();
            // $table->foreignId('medicine_id')->constrained();
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
