<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyStatusesInserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('statuses', function (Blueprint $table) {
            
            DB::insert('insert into statuses (id, status) values (1, "New")', [1, 'New']);
            DB::insert('insert into statuses (id, status) values (2, "Processing")', [2, 'Processing']);
            DB::insert('insert into statuses (id, status) values (3, "WaitingForUserConfirmation")', [3, 'WaitingForUserConfirmation']);
            DB::insert('insert into statuses (id, status) values (4, "Canceled")', [4, 'Canceled']);
            DB::insert('insert into statuses (id, status) values (5, "Confirmed")', [5, 'Confirmed']);
            DB::insert('insert into statuses (id, status) values (6, "Delivered")', [6, 'Delivered']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('statuses', function (Blueprint $table) {
            //
        });
    }
}
