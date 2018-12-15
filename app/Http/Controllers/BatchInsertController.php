<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\BatchSubmit;
use App\BatchBag;
use Carbon\Carbon;
use App\PillowWeight;
use App\SubmitTime;
use App\Http\Requests\SubmitBatch;
use Validator;
use Illuminate\Support\Collection;




class BatchInsertController extends Controller
{

    /**
     * -----------------------------------------
     * Insert batch_submit
     * -----------------------------------------
     * @param SubmitBatch $request
     * @return void
     * -----------------------------------------
     */
    public function storeSubmit(SubmitBatch $request) {


        // prepare insert
        $batchSubmit = new BatchSubmit(array(
            'status' => $request->input('status'),
            'submitter' => $request->input('submitter'),
            'batch_id' => $request->input('bnum'),
            'cooler' => $request->input('cooler'),
            'kegs_filled' => $request->input('kegsFilled'),
            'date_filled' => $request->input('dfilled'),
            'date_run' => $request->input('drun'),
            'total_flower_weight' => $request->input('totalFlowWeight'),
            'total_batch_weight' => $request->input('totalBatchWeight'),
        ));


        // insert to DB
        $batchSubmit->save();

        $batchNumber = $request->input('bnum');
        $bagNumber = $request->input('bag_text');
        $bagWeight = $request->input('bag_weight');
        $flowerWeight = $request->input('flow_weight');
        $pillowWeight = $request->input('pillow');

        //new SubmitTime;
        $splits = collect($request->input('split'));

        // times and temps
        $timesAndTemps = new SubmitTime(array(
            'batch_id' => $batchNumber,
            'res_temp_first' => $request->input('resTempFirst'),
            'soak_time_first' => $splits->get(0),
            'aggitation_time_first' => $splits->get(1),
            'exit_temp_first' => $request->input('exitTempFirst'),
            'res_temp_scnd' => $request->input('resTempScnd'),
            'soak_time_scnd' => $splits->get(2),
            'aggitation_time_scnd' => $splits->get(3),
            'exit_temp_scnd' => $request->input('exitTempScnd'),
            'total_time' => $request->input('totTime')
        ));


        // insert into times and temps table
        $timesAndTemps->save();

        // insert a row for each bag ID not equal to null
         for ($i = 9; $i > -1; $i--) {
            if ($bagNumber[$i] != null) {


                $bag = new BatchBag;

                $bag->batch_id = $batchNumber;
                $bag->bag_number = $bagNumber[$i];
                $bag->bag_weight = $bagWeight[$i];
                $bag->flower_weight = $flowerWeight[$i];

                $bag->save();

            } else {
                break;
            }
        }
        // insert a new row for each pillow weight not equal to null
        for ($n = 9; $n > -1; $n--) {
            if ($pillowWeight[$n] != null) {

                $pillow = new PillowWeight;

                $pillow->batch_id = $batchNumber;
                $pillow->pillow = $pillowWeight[$n];

                $pillow->save();
            } else {
                break;
            }
        }


        return redirect('/home');
    }

}
