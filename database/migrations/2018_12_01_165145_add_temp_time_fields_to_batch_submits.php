<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTempTimeFieldsToBatchSubmits extends Migration
{
    /**
     * Run the migrations.
     *
     * For form fields revolving around time and temp
     * @return void
     */
    public function up()
    {

        Schema::table('batch_submits', function (Blueprint $table) {
            $table->string('resTempFirst');
            $table->string('resTempFirst');
            $table->string('resTempFirst');
            $table->string('resTempFirst');
            $table->string('resTempFirst');
            $table->string('resTempFirst');
            $table->string('resTempFirst');
            $table->string('resTempFirst');
            $table->string('resTempFirst');
            $table->string('resTempFirst');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('batch_submits', function (Blueprint $table) {
            //
        });
    }
}
