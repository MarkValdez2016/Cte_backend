<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

use DB;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scheduledata = Schedule::all();
        return $scheduledata;
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
        $scheduledata = new Schedule;

        $scheduledata -> schedule_class_name           = request('schedule_class_name');
        $scheduledata -> schedule_day            = request('schedule_day');
        $scheduledata -> schedule_start_time      = request('schedule_start_time');
        $scheduledata -> schedule_end_time        = request('schedule_end_time');

        $scheduledata->save();
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedules
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedules)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedules  $schedules
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedules $schedules)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedules
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedules)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedules
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedules)
    {
        
    }
}
