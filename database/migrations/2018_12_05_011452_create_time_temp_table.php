<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeTempTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('submit_times')) {
            Schema::create('submit_times', function (Blueprint $table) {
                $table->increments('id');
                $table->string('batch_id');
                $table->date('date_run');
                $table->decimal('res_temp_first', 8, 2);
                $table->string('soak_time_first');
                $table->string('aggitation_time_first');
                $table->decimal('exit_temp_first', 8, 2);
                $table->decimal('res_temp_scnd', 8, 2);
                $table->string('soak_time_scnd');
                $table->string('aggitation_time_scnd');
                $table->decimal('exit_temp_scnd', 8, 2);
                $table->string('total_time');
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
        Schema::dropIfExists('submit_times');
    }
}
