<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeBagWeightToNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('batch_bags', 'bag_weight')) {
            Schema::table('batch_bags', function (Blueprint $table) {
                $table->decimal('bag_weight')->nullable()->change();
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
        /* Schema::table('nullable', function (Blueprint $table) {
            //
        }); */
    }
}
