<?php

namespace App\Http\Controllers;

use DB;
use App\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('admin.packages.list')->with('packages', Package::all());
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $data['package'] = new Package;
        return view('admin.packages.form', $data);
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
            
            $package = Package::create($input);
            $notification = array(
                'message' => 'Package created!',
                'alert-type' => 'success'
            );
            DB::commit();
        } catch (\Throwable $th) {
            $notification = array(
                'message' => 'Error Occured!',
                'alert-type' => 'error'
            );
            DB::rollback();
        }
        return redirect('packages')->with($notification);
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
    public function edit(Package $package)
    {
        $data['package'] = $package;
        return view('admin.packages.form', $data);
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Package $package)
    {
        {
            $input = $request->all();
            unset($input['_token']);
            try {
                DB::beginTransaction();
                
                $package = $package->update($input);
                $notification = array(
                    'message' => 'Package updated!',
                    'alert-type' => 'success'
                );
                DB::commit();
            } catch (\Throwable $th) {
                $notification = array(
                    'message' => 'Error Occured!',
                    'alert-type' => 'error'
                );
                DB::rollback();
            }
            return redirect('packages')->with($notification);
        }
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy(Package $package)
    {
        $package->delete();
        $notification = array(
            'message' => 'Package deleted!',
            'alert-type' => 'success'
        );
        return redirect('packages')->with($notification);
        
    }
}
