<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;

use DB;

class TrainingController extends Controller
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trainingdata = Training::find($id);

            return $trainingdata;

            return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function edit(Training $training)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $trainingdata = Training::find($request->id);

            $trainingdata->trainingName       =$request->trainingName;
            $trainingdata->trainingStart       =$request->trainingStart;
            $trainingdata->trainingEnd       =$request->trainingEnd;
            $trainingdata->trainingHours      =$request->trainingHours;
            $trainingdata->trainingType     =$request->trainingType;
            $trainingdata->trainingConduct   =$request->trainingConduct;
           
            
            $trainingdata->save();
            
            return back();
            
        } catch (\Throwable $th) {
            //throw $th;
        }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trainingdata = Training::find($id);

        return $trainingdata->delete();

        return back();
    }
}
