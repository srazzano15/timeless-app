<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\BatchSubmit;
use App\BatchBag;
use Carbon\Carbon;
use App\PillowWeight;
use App\SubmitTime;



class BatchInsertController extends Controller
{

    /**
     * -----------------------------------------
     * Insert batch_submit
     * -----------------------------------------
     * @param Request $request
     * @return void
     * -----------------------------------------
     */
    public function storeSubmit(Request $request) {

        /* // Validation Rules
        $validateData = $request->validate([
            'bnum' => 'required|unique:batch_submits,batch_id',
            'dfilled' => 'required',
            'cooler' => 'required',
            'drun' => 'required'
        ]);
        */
        // Return inputs to variables for ease of use
        $batchNumber = $request->input('bnum');
        $dateFilled = $request->input('dfilled');
        $cooler = $request->input('cooler');
        $dateRun = $request->input('drun');
        $submitter = $request->input('submitter');
        $kegs = $request->input('kegsFilled');
        $totalFlowWt = $request->input('totalFlowWeight');
        $totalBatchWt = $request->input('totalBatchWeight');
        $status = $request->input('status');

        // format date inputs using Carbon package
        $dateFillParse = Carbon::parse($dateFilled)->format('Y-m-d');
        $dateRunParse = Carbon::parse($dateRun)->format('Y-m-d');

        // prepare insert
        $batchSubmit = new BatchSubmit;

        $batchSubmit->status = $status;
        $batchSubmit->submitter = $submitter;
        $batchSubmit->batch_id = $batchNumber;
        $batchSubmit->cooler = $cooler;
        $batchSubmit->kegs_filled = $kegs;
        $batchSubmit->date_filled = $dateFillParse;
        $batchSubmit->date_run = $dateRunParse;
        $batchSubmit->total_flower_weight = $totalFlowWt;
        $batchSubmit->total_batch_weight = $totalBatchWt;

        // insert to DB
        $batchSubmit->save();

        echo $batchSubmit;

        $batchNumber = $request->input('bnum');
        $bagNumber = $request->input('bag_number');
        $bagWeight = $request->input('bag_weight');
        $flowerWeight = $request->input('flow_weight');

        // insert a row for each bag ID not equal to null
        for ($i = 0; $i < 10; $i++) {
            if ($bagNumber[$i] != null) {
                $bag = new BatchBag;

                $bag->batch_id = $batchNumber;
                $bag->bag_number = $bagNumber[$i];
                $bag->bag_weight = $bagWeight[$i];
                $bag->flower_weight = $flowerWeight[$i];

                $bag->save();

            } else {
                exit();
            }
        }

    }

}
