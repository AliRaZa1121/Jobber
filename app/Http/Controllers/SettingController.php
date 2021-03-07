<?php

namespace App\Http\Controllers;

use DB;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('admin.settings.list')->with('settings', Setting::all());
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $data['setting'] = new Setting;
        return view('admin.settings.form', $data);
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $input = $request->all();
        unset($input['_token']);
        try {
            DB::beginTransaction();
            $setting = Setting::create($input);
            $notification = array(
                'message' => 'Setting created!',
                'alert-type' => 'success'
            );
            DB::commit();
        } catch (\Throwable $th) {
            $notification = array(
                // 'message' => $th->getMessage(),
                'message' => 'Error Occured!',
                'alert-type' => 'error'
            );
            DB::rollback();
        }
        return redirect('settings')->with($notification);
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
    public function edit(Setting $setting)
    {
        $data['setting'] = $setting;
        return view('admin.settings.form', $data);
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Setting $setting)
    {

        $input = $request->all();
        unset($input['_token']);
        try {
            DB::beginTransaction();
            $setting = $setting->update($input);
            $notification = array(
                'message' => 'Setting updated!',
                'alert-type' => 'success'
            );
            DB::commit();
        } catch (\Throwable $th) {
            $notification = array(
                // 'message' => $th->getMessage(),
                'message' => 'Error Occured!',
                'alert-type' => 'error'
            );
            DB::rollback();
        }
        return redirect('settings')->with($notification);
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy(Setting $setting)
    {
        $setting->delete();
        $notification = array(
            'message' => 'Setting deleted!',
            'alert-type' => 'success'
        );
        return redirect('settings')->with($notification);
    }
}
