<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


use App\Models\User;
use App\Models\Role;
use App\Models\Profile;
use App\Models\Employment;
use App\Models\EducationalBackground;
use App\Models\Training;


class UserController extends Controller
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
    public function create(Request $request)
    {
        try {

            // Account
            $user = new User;

            $user->email    = request("email");
            $user->password = Hash::make(request("password"));
            
            $user->save();
    
            $role = Role::select('id')->where('name', 'Staff')->first();
            $user->role()->attach($role);

            // PROFILE
            $profile = new Profile;
            
            $profile->last_name             = request('last_name');
            $profile->first_name            = request('first_name');
            $profile->middle_name           = request('middle_name');
            $profile->birth_date            = request('birth_date');
            $profile->civil_status          = request('civil_status');
            $profile->gender                = request('gender');
            $profile->religion              = request('religion');
            $profile->address               = request('address');
            $profile->zip_code              = request('zip_code');

            
            if ($request->hasfile('image')) {

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/', $filename);
                $profile->image = $filename;

            } else {
                $profile->image    = '';
            }


            $profile->created_at            = now();
            $profile->updated_at            = now();

            $profile->save();


            $prof = Profile::select('id')->where('id', $profile->id)->first();
            $user->profile()->attach($prof);


            // Employment
            $employment = new Employment;
            
            $employment->employment_WMSU_id     = request('employment_WMSU_id');
            $employment->employment_PRC_id      = request('employment_PRC_id');
            $employment->employment_department  = request('employment_department');
            $employment->employment_position    = request('employment_position');
            $employment->employment_date        = request('employment_date');
            $employment->user_id                = $user->id;
            $employment->profile_id             = $profile->id;


            $employment->created_at             = now();
            $employment->updated_at             = now();

            $employment->save();

            // Educational Background
            $educationaldata = new EducationalBackground;
            
            $educationaldata->educational_school_name   = request('educational_school_name');
            $educationaldata->educational_course        = request('educational_course');
            $educationaldata->educational_start_date    = request('educational_start_date');
            $educationaldata->educational_end_date      = request('educational_end_date');
            $educationaldata->educational_attainment    = request('educational_attainment');
            $educationaldata->user_id                   = $user->id;
            $educationaldata->profile_id                = $profile->id;;


            $educationaldata->created_at                = now();
            $educationaldata->updated_at                = now();
            $educationaldata->save();

            // Training
            $trainingdata = new Training;

            $trainingdata->training_name           = request('training_name');
            $trainingdata->training_date_start     = request('training_date_start');
            $trainingdata->training_date_end       = request('training_date_end');
            $trainingdata->number_of_hours         = request('number_of_hours');
            $trainingdata->training_type           = request('training_type');
            $trainingdata->training_conducted_by   = request('training_conducted_by');
            $trainingdata->user_id                 = $user->id;
            $trainingdata->profile_id              = $profile->id;


            $trainingdata -> save();

        } catch (\Throwable $th) {

            throw $th;
        }
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

            // Account
            $user = new User;

            $user->email    = request("email");
            $user->password = Hash::make(request("password"));
            
            $user->save();
    
            $role = Role::select('id')->where('name', 'Staff')->first();
            $user->role()->attach($role);

            // PROFILE

            $profile = new Profile;
            
            $profile->last_name     = request('last_name');
            $profile->first_name    = request('first_name');

            $profile->created_at    = now();
            $profile->updated_at    = now();

            if ($request->hasfile('image')) {

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/', $filename);
                $profile->image = $filename;

            } else {
                $profile->image    = '';
            }

            $profile->save();


            $prof = Profile::select('id')->where('id', $profile->id)->first();
            $user->profile()->attach($prof);


            // Employment
            $employment = new Employment;
            $employment->user_id    = $user->id;
            $employment->profile_id = $profile->id;

            $employment->created_at = now();
            $employment->updated_at = now();

            $employment->save();

            // Educational Background
            $educationaldata = new EducationalBackground;

            $educationaldata->user_id       = $user->id;
            $educationaldata->profile_id    = $profile->id;;

            $educationaldata->created_at    = now();
            $educationaldata->updated_at    = now();

            $educationaldata->save();

            // Training
            $trainingdata = new Training;

            $trainingdata->user_id      = $user->id;
            $trainingdata->profile_id   = $profile->id;

            $trainingdata -> save();

        } catch (\Throwable $th) {

            throw $th;
        }
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
        //
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
