<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropKegsFilledFromBatchSubmits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('batch_submits', 'kegs_filled')) {
            Schema::table('batch_submits', function (Blueprint $table) {
                $table->dropColumn('kegs_filled');
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
        
        

    }
}
