<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\BatchBag;
use App\BatchSubmit;
use App\PillowWeight;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

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

        $v = Validator::make($request->all(), [
            'bnum' => 'required|unique:batch_submits,batch_id',
            'dFilled' => 'required|date',
            'cooler' => 'required|integer',
            'submitter' => 'required|string',
            'totalPillowWeight' => 'required',
            'totalBagWeight' => 'required',
            'submitStatus' => 'required',
            'package_id.*' => 'required|distinct',
            'bag_weight.*' => 'required',
            'flow_weight.*' => 'required',
            'pillow.*' => 'required',
        ])->validate();


        // prepare insert
        

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

        foreach ($bagNumber as $bn)
        {
            $bn = str_replace('timeless', 'Timeless', $bn);
            $bn = str_replace('trim', 'Trim', $bn);
            $bn = str_replace('--', '-', $bn);
            $bn = str_replace('extract', 'Extract', $bn);
            $bn = str_replace(' ', '', $bn);
        }

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
        
        

        

        return redirect('/admin')->with(['success' => true]);
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
/*         $entry = BatchSubmit::findOrFail($id);
        return view('admin.crud.update')->with('entry', $entry); */
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
