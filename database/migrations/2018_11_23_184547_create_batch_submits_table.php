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
                $table->string('status')->default('Stuffed');
                $table->integer('user_id');
                $table->string('submitter');
                $table->string('batch_id');
                $table->integer('cooler');
                $table->string('kegs_filled');
                $table->date('date_filled');
                $table->decimal('total_flower_weight', 8, 2);
                $table->decimal('total_batch_weight', 8, 2);
                $table->timestamps();
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
