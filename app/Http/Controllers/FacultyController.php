<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Profile;
use App\Models\Employment;
use App\Models\EducationbBackground;


class FacultyController extends Controller
{
    function Dean() 
    {
        $deandata = DB::select('SELECT * FROM employments INNER JOIN profiles ON employments.profile_id = profiles.id WHERE employments.employment_department = "Deans Office"');
        return $deandata;
    }
    function elementary() 
    {
        $elementarydata = DB::select('SELECT * FROM employments INNER JOIN profiles ON employments.profile_id = profiles.id WHERE employments.employment_department = "Elementary Education Department"');
        return $elementarydata;
    }
    function Secondary() 
    {
        $secondarydata = DB::select('SELECT * FROM employments INNER JOIN profiles ON employments.profile_id = profiles.id WHERE employments.employment_department = "Secondary Education Department"');
        return $secondarydata;
    }
    function Special() 
    {
        $specialdata = DB::select('SELECT * FROM employments INNER JOIN profiles ON employments.profile_id = profiles.id WHERE employments.employment_department = "Special Education Department"');
        return $specialdata;
    }
}
