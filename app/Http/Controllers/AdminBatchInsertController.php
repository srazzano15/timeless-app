<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\BatchBag;
use App\BatchSubmit;
use App\PillowWeight;
use Carbon\Carbon;

class AdminBatchInsertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('admin.crud.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // get the user
        $user = Auth::user();

        // prepare insert
        /* $batchSubmit = new BatchSubmit(array(
            'user_id' => $user->id,
            'status' => $request->input('submitStatus'),
            'submitter' => $request->input('submitter'),
            'batch_id' => $request->input('bnum'),
            'cooler' => $request->input('cooler'),
            'kegs_filled' => $request->input('kegsFilled'),
            'date_filled' => $request->input('dFilled'),
            'total_flower_weight' => $request->input('totalFlowWeight'),
            'total_batch_weight' => $request->input('totalBagWeight'),
        )); */

        // format string for datetime
        $dateFilled = $request->input('dFilled');
        $formattedDate = Carbon::parse($dateFilled)->format('Y-m-d');

        // new model instance
        $batchSubmit = new BatchSubmit;

        // assign vals
        $batchSubmit->user_id = $user->id;
        $batchSubmit->status = $request->input('submitStatus');
        $batchSubmit->submitter = $request->input('submitter');
        $batchSubmit->batch_id = $request->input('bnum');
        $batchSubmit->cooler = $request->input('cooler');
        $batchSubmit->date_filled = $formattedDate;
        $batchSubmit->total_flower_weight = $request->input('totalPillowWeight');
        $batchSubmit->total_batch_weight = $request->input('totalBagWeight');



        

        // insert to DB
        $batchSubmit->save();

        // prepare bags and pillows to insert
        $batchNumber = $request->input('bnum');
        $bagNumber = $request->input('package_id');
        $bagWeight = $request->input('bag_weight');
        $flowerWeight = $request->input('flow_weight');
        $pillows = $request->input('pillow');

        // for each bag row, insert a row into the DB tied to the batch id
        for ($i = 0; $i < count($bagNumber); $i++) {

            $bag = new BatchBag;

            $bag->batch_id = $batchNumber;
            $bag->package_id = $bagNumber[$i];
            $bag->bag_weight = $bagWeight[$i];
            $bag->flower_weight = $flowerWeight[$i];

            $bag->save();
        }

        // for each pillow row, insert a row into the DB tied to the batch id
        for ($n = 0; $n < count($pillows); $n++) {

            $newPillow = new PillowWeight;

            $newPillow->batch_id = $batchNumber;
            $newPillow->pillow = $pillows[$n];

            $newPillow->save();
        }
        
        

        

        //return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
