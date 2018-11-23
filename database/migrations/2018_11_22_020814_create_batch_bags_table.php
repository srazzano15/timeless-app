<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchBagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('batch_bags')) {
            Schema::create('batch_bags', function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();
                $table->string('batch_id');
                $table->string('bag_number');
                $table->float('bag_weight');
                $table->float('flower_weight');
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
        Schema::dropIfExists('batch_bags');
    }
}
