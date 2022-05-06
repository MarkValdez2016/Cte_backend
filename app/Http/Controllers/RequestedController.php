<?php

namespace App\Http\Controllers;
    
use Illuminate\Support\Facades\Auth;
use App\Models\Requested;
use Illuminate\Http\Request;

use DB;

class RequestedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requestdata = Requested::all();

            return $requestdata;
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
        try {
            
            $request = new Requested;
            
            $request->request_details       =request('request_details');
            $request->request_image         =request('request_image');
            $request->status_id             =request('status_id');

            $request->created_at            =now();
            $request->updated_at            =now();
            $request->save();
            
            return back();

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Requested  $requested
     * @return \Illuminate\Http\Response
     */
    public function show(Requested $requested)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Requested  $requested
     * @return \Illuminate\Http\Response
     */
    public function edit(Requested $requested)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Requested  $requested
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requested $requested)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Requested  $requested
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requested $requested)
    {
        //
    }
}
