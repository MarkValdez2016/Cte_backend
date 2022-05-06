<?php

namespace App\Http\Controllers;

use App\Models\EducationalBackground;
use Illuminate\Http\Request;

use DB;
class EducationalBGController extends Controller
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
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EducationalBG  $educationalBG
     * @return \Illuminate\Http\Response
     */
    public function show(EducationalBG $educationalBG)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EducationalBG  $educationalBG
     * @return \Illuminate\Http\Response
     */
    public function edit(EducationalBG $educationalBG)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EducationalBG  $educationalBG
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $educationaldata = EducationalBG::find($request->id);

            $educationaldata->educational_school_name       =$request->educational_school_name;
            $educationaldata->educational_course            =$request->educational_course;
            $educationaldata->educational_start_date        =$request->educational_start_date;
            $educationaldata->educational_end_date          =$request->educational_end_date;
            $educationaldata->educational_attainment        =$request->educational_attainment;
           
            
            $educationaldata->save();
            
            return back();
            
        } catch (\Throwable $th) {
            //throw $th;
        }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EducationalBG  $educationalBG
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $data = EducationalBG::find($id);
            $data->delete();
           
            return back();
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
