<?php

namespace App\Http\Controllers\Auth;

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

use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);

        try {

            // Account
            $user = new User;

            $user->email    = request("email");
            $user->password = Hash::make(request("password"));
            
            $user->save();
    
            $role = Role::select('id')->where('name', 'Staff')->first();
            $user->role()->attach($role);

            // PROFILE
            // $uploadedfile = $request->image->store('/public/uploads');

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
            $profile->image                 = request('image')->store('/public/uploads');

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

            $educationaldata->created_at            =now();
            $educationaldata->updated_at            =now();
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

            $trainingdata -> save();

        } catch (\Throwable $th) {

            throw $th;
        }
    }
}
