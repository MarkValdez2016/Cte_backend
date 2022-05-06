<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use DB;

class ProfileController extends Controller
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
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profilesData = Profile::find($id);
        return $profilesData;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        $profile = Profile::find($id);
        return $profile;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $profile = Profile::find($request->id);

            $profile->last_name     = $request->last_name;
            $profile->first_name    = $request->first_name;
            $profile->middle_name   = $request->middle_name;
            $profile->birth_date    = $request->birth_date;
            $profile->civil_status  = $request->civil_status;
            $profile->gender        = $request->gender;
            $profile->religion      = $request->religion;
            $profile->address       = $request->address;
            $profile->zip_code      = $request->zip_code;

            if ($request->hasfile('image')) {

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/', $filename);
                $profile->image = $filename;

            } else {
                $profile->image     = '';
            }

            $profile->updated_at    = today();

            $profile->save();
            return back();
            
        } catch (\Throwable $th) {
            throw $th;
        }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        try {
            $data = Profile::find($id);
            $data->delete();
            
            return back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
