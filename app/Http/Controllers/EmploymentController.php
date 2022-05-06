<?php

namespace App\Http\Controllers;

use App\Models\Employment;
use Illuminate\Http\Request;

use DB;

class EmploymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employment  $employment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employmentData = Employment::find($id);
            return $employmentData;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employment  $employment
     * @return \Illuminate\Http\Response
     */
    public function edit(Employment $employment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employment  $employment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $employmentdata = Employment::find($request->id);      
            
            $employmentdata->employment_WMSU_id                 =$request->employment_WMSU_id;
            $employmentdata->employment_PRC_id                  =$request->employment_PRC_id;
            $employmentdata->employment_department              =$request->employment_department;
            $employmentdata->employment_position                =$request->employment_position;
            $employmentdata->employment_date                    =$request->employment_date;
            $employmentdata->user_id                            =2;
            
            $employmentdata->save();
            
            return back();
            
         } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employment  $employment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $employmentdata = Employment::find($id);
            $employmentdata->delete();
            return back();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
