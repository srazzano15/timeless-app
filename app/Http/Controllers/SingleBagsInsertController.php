<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BatchBag;
use App\ImportData;
use Auth;

class SingleBagsInsertController extends Controller
{
    /**
     * Route name: admin_submit_bags
     * @return void
     */

    public function index()
    {
        $user = Auth::user();
        return view('admin.crud.bag_insert', [
            'user' => $user,
        ]);
    }

    /**
     * @param Request $request
     * 
     */

    public function store(Request $request)
    {
        
        $batch_id = $request->input('batch_id');
        $package_id = $request->input('package_id');
        $flow_weight = $request->input('flow_weight');
 
        //dd($submission);

        for ($i = 9; $i > -1; $i--)
        {
            if ( $package_id[$i] != null )
            {
                
                $submission = new BatchBag(array(
                    'batch_id' => $batch_id,
                    'bag_number' => $package_id[$i],
                    'flower_weight' => $flow_weight[$i]
            
                ));
                $import_row = ImportData::where( 'bag_id', $package_id[$i] )->first();
                $import_row->batch_id = $batch_id;
                $import_row->flower_weight = $flow_weight[$i];
            
                $submission->importMatch()->associate($import_row);
                
                $submission->push();
            } else {
                break;
            }
           
        }
        return redirect('/admin/edit');

    }

}
