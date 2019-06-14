<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImportData as Import;
use App\Http\Resources\ImportData as ImportDataResource;
use Validator;

class ImportDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Validator::make($request->all(), [
            'batch_id' => 'nullable',
            'bag_id' => 'required|unique:import_export_csv,bag_id',
            'bag_weight' => 'required',
            'flower_weight' => 'required'
        ])->validate();

        $created = new Import;
        $created->batch_id = $request->input('batch_id');
        $created->bag_id = $request->input('bag_id');
        $created->bag_weight = $request->input('bag_weight');
        $created->flower_weight = $request->input('flower_weight');

        $created->batch_id = $created->batch_id == '' ? null : $created->batch_id;

        $created->save();
        return response()->json();
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
        $r = Import::findOrFail($id);

        $r->batch_id = $request->input('batch_id');
        $r->bag_id = $request->input('bag_id');
        $r->bag_weight = $request->input('bag_weight');
        $r->flower_weight = $request->input('flower_weight');

        $r->push();
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $i = Import::find($id);
        $i->delete();

        return response()->json();
    }
}
