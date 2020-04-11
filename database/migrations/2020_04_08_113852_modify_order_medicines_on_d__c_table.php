<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyOrderMedicinesOnDCTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_medicines', function (Blueprint $table) {
            $table->dropForeign('order_medicines_order_id_foreign'); 
            $table->dropForeign('order_medicines_medicine_id_foreign');
            $table->dropColumn('order_id');
            $table->dropColumn('medicine_id');
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
