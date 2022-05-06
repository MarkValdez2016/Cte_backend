<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserController;
use App\Models\Employment;
use App\Models\EducationalBackground;
use DB;

class AnalyticsController extends Controller
{
    public function degree1()
    {
        $attainment1 = DB::table('educational_backgrounds')
        ->where('educational_attainment', '=', 'Bachelor Degree')
        ->count();
        return $attainment1;

    }
    public function degree2()
    {
        $attainment2 = DB::table('educational_backgrounds')
        ->where('educational_attainment', '=', 'Master Degree')
        ->count();
        return $attainment2;

    }
    public function degree3()
    {
        $attainment3 = DB::table('educational_backgrounds')
        ->where('educational_attainment', '=', 'Doctorate Degree')
        ->count();
        return $attainment3;

    }
    public function department1()
    {
        $dp1 = DB::table('employments')
        ->where('employment_department', '=', 'Elementary Education Department')
        ->count();
        return $dp1;

    }
    public function department2()
    {
        $dp2 = DB::table('employments')
        ->where('employment_department', '=', 'Secondary Education Department')
        ->count();
        return $dp2;

    }
    public function department3()
    {
        $dp3 = DB::table('employments')
        ->where('employment_department', '=', 'Special Education Department')
        ->count();
        return $dp3;

    }


}
