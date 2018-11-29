<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\BatchSubmit;
use App\BatchBag;
use Carbon\Carbon;



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

        // Validation Rules
        $validateData = $request->validate([
            'bnum' => 'required|unique:batch_submits,batch_id',
            'dfilled' => 'required',
            'cooler' => 'required',
            'drun' => 'required'
        ]);

        // Return inputs to variables for ease of use
        $batchNumber = $request->input('bnum');
        $dateFilled = $request->input('dfilled');
        $cooler = $request->input('cooler');
        $dateRun = $request->input('drun');

        // format date inputs using Carbon package
        $dateFillParse = Carbon::parse($dateFilled)->format('Y-m-d');
        $dateRunParse = Carbon::parse($dateRun)->format('Y-m-d');

        // prepare insert
        $batchSubmit = new BatchSubmit;
            $batchSubmit->batch_id = $batchNumber;
            $batchSubmit->date_filled = $dateFillParse;
            $batchSubmit->cooler = $cooler;
            $batchSubmit->date_run = $dateRunParse;

        // insert to DB
        $batchSubmit->save();



    }



    /**
     * -----------------------------------------
     * Insert to batch_bags table
     * -----------------------------------------
     * @param Request $request
     * @return void
     * -----------------------------------------
     */
    public function storeBag(Request $request) {


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
                die('Thank you for your submissions!');
            }
        };

    }

}
