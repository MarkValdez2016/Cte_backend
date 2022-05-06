<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware(['auth:sanctum'])->group(function(){

// });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Register 
Route::post('register/create', 'App\Http\Controllers\UserController@create');

//login
Route::post('login', 'App\Http\Controllers\LoginController@authenticate');
Route::get('logout', 'App\Http\Controllers\LoginController@logout');
//user control store profile,employment,bg,training
Route::post('user', 'App\Http\Controllers\UserController@store');


//Announcement-Adminside
Route::post('announcement/store','App\Http\Controllers\AnnouncementController@store');
Route::post('announcement/update/{id}','App\Http\Controllers\AnnouncementController@update');
Route::delete('announcement/destroy/{id}','App\Http\Controllers\AnnouncementController@destroy');
Route::get('announcement/show','App\Http\Controllers\AnnouncementController@index');

//profile
Route::post('profile/update/{id}','App\Http\Controllers\ProfileController@update');
Route::delete('profile/destroy/{id}','App\Http\Controllers\ProfileController@destroy');
Route::get('profile/show','App\Http\Controllers\ProfileController@index');

//educational background
Route::post('educational/update/{id}','App\Http\Controllers\EducationalBackgroundController@update');
Route::delete('educational/destroy/{id}','App\Http\Controllers\EducationalBackgroundController@destroy');
Route::get('educational/show','App\Http\Controllers\EducationalBackgroundController@index');

//employments
Route::post('employments/update/{id}','App\Http\Controllers\EmploymentController@update');
Route::delete('employments/destroy/{id}','App\Http\Controllers\EmploymentController@destroy');
Route::get('employments/show','App\Http\Controllers\EmploymentController@index');

//training
Route::post('training/update/{id}','App\Http\Controllers\TrainingController@update');
Route::delete('training/destroy/{id}','App\Http\Controllers\TrainingController@destroy');
Route::get('training/show','App\Http\Controllers\TrainingController@index');

//requested
Route::post('requested/store','App\Http\Controllers\RequestedController@store');
//To appear in admin table all the request of teachers
Route::get('requested/show', 'App\Http\Controllers\RequestedController@index');

//schedules
Route::post('schedules/store', 'App\Http\Controllers\Scheduleontroller@store');
Route::get('schedules/show', 'App\Http\Controllers\Scheduleontroller@index');
Route::get('schedules/destroy', 'App\Http\Controllers\Scheduleontroller@destroy');
Route::get('schedules/update', 'App\Http\Controllers\Scheduleontroller@update');

//Analytics 

//Attainment
Route::get('degree/bachelor','App\Http\Controllers\AnalyticsController@degree1');
Route::get('degree/master','App\Http\Controllers\AnalyticsController@degree2');
Route::get('degree/doctorate','App\Http\Controllers\AnalyticsController@degree3');

//Department
Route::get('department/elementary','App\Http\Controllers\AnalyticsController@dp1');
Route::get('department/secondary','App\Http\Controllers\AnalyticsController@dp2');
Route::get('department/special','App\Http\Controllers\AnalyticsController@dp3');

//faculty

Route::get('faculty/elementary','App\Http\Controllers\FacultyController@elementary');
Route::get('faculty/dean','App\Http\Controllers\FacultyController@Dean');
Route::get('faculty/secondary','App\Http\Controllers\FacultyController@Secondary');
Route::get('faculty/special','App\Http\Controllers\FacultyController@Special');




