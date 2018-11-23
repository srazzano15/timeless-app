<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchSubmitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('batch_submits')) {
            Schema::create('batch_submits', function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();
                $table->string('batch_id');
                $table->date('date_filled');
                $table->integer('cooler');
                $table->date('date_run');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('batch_submits');
    }
}
