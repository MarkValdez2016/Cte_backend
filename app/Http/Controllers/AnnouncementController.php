<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

use DB;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcementData = Announcement::all();
            return $announcementData;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            
            
            $announcementData = new Announcement;
            
            $announcementData->announcement_type              = request('announcement_type');
            $announcementData->announcement_details           = request('announcement_details');
            
            if ($request->hasfile('announcement_image')) {

                $file = $request->file('announcement_image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/', $filename);
                $announcementData->announcement_image = $filename;
            } else {
                return request();
                $announcementData->announcement_image    = ' ';
            }

            $announcementData->save();
 
            return back();

        } catch (\Throwable $th) {
            throw $th;
        }   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $announcementData = Announcement::find($request->id);

            $announcementData->announcement_type       =$request->announcement_type;
            $announcementData->announcement_details       =$request->announcement_details;
            if ($request->hasfile('announcement_image')) {

                $file = $request->file('announcement_image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/', $filename);
                $announcementData->announcement_image = $filename;
            } else {
                return request();
                $announcementData->announcement_image    = ' ';
            }

            $announcementData->save();
            
            return back();
            
        } catch (\Throwable $th) {
            //throw $th;
        }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $announcementData = Announcement::find($id);
            $announcementData->delete();
            
            return back();

        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
