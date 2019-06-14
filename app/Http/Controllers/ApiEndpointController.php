<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImportData;
use App\Batchbags;
use App\Http\Resources\ImportData as Imported;


class ApiEndpointController extends Controller
{
    /**
     * Report for inserted bags via the form
     *
     * @return void
     */
    public function bagStats()
    {
        return BatchBag::all();
    }

    /**
     * Report for showing disparity of inserted bags w/ imported
     * bags
     * 
     * @return void
     */
    public function disparityData()
    {
        $data = ImportData::has('bagMatch')->with('bagMatch')->get();

        return $data;
    }

    /**
     * Endpoint for the general admin dashboard table for 
     * outstanding stuffed batches.
     *
     * @return void
     */
    public function stuffedBatches()
    {
        return BatchSubmit::where('status', 'Stuffed')->get();
    }

    /**
     * Endpoint for deleting imported bags because of potential duplicates
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteImportedData($id)
    {
        $imported = App\ImportData::find($id);
        $imported->delete();
        
        return response()->json();
    }
}
