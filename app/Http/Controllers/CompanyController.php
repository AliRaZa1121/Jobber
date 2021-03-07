<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use App\Company;
use App\Category;
use App\Traits\EmailTrait;
use App\Traits\SlugTrait;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    use EmailTrait;
    use SlugTrait;
    use UploadTrait;
    
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('admin.companies.list')->with('companies', Company::all());
    }
    
    public function indexUsers()
    {
        return view('admin.companies.list')->with('companies', Company::where('user_id', Auth::user()->id)->get());
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create($identity_token)
    {
        $data['company'] = new Company;
        $data['categories'] = Category::all();
        $data['user'] = User::where('identity_token', $identity_token)->first();
        return view('admin.companies.form', $data);
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
        $input['slug'] = $this->slugify($input['name']);
        $input['image'] = isset($input['profile_avatar'])?$input['profile_avatar']:null; 
        unset($input['profile_avatar_remove'], $input['_token'], $input['profile_avatar']);
        try {
            DB::beginTransaction();
            if($input['image'] != null)
            {
                // uploadImage('image', name, 'folder', 'storage')
                $input['image'] = $this->uploadImage($input['image'], $input['name'] , '/uploads/companies/', 'public');
                
            }
            else{
                $input['image'] = '';
            }
            
            $company = Company::create($input);
            $notification = array(
                'message' => 'Company created!',
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
        if(Auth::user()->role->slug == 'admin')
        return redirect('companies')->with($notification);
        else
        return redirect('user/companies')->with($notification);
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show(Company $company)
    {
        $data['company'] = $company;
        return view('admin.companies.modal', $data);
    }

    public function markVerified(Company $company)
    {
        $company->update(['is_verified' => 1]);
        $notification = array(
            'message' => 'Company verified now!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit(Company $company)
    {
        $data['company'] = $company;
        $data['categories'] = Category::all();
        return view('admin.companies.form', $data);
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Company $company)
    {

        $input = $request->all();
        $input['slug'] = $this->slugify($input['name']);
        $input['image'] = isset($input['profile_avatar'])?$input['profile_avatar']:null; 
        unset($input['profile_avatar_remove'], $input['_token'], $input['profile_avatar']);
        try {
            DB::beginTransaction();
            if($input['image'] != null)
            {
                // uploadImage('image', name, 'folder', 'storage')
                $input['image'] = $this->uploadImageUpdate($input['image'], $company , '/uploads/companies/', 'public');
                
            }
            else{
                $input['image'] = $company->image;
            }
            
            $company = $company->update($input);
            $notification = array(
                'message' => 'Company updated!',
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
        if(Auth::user()->role->slug == 'admin')
        return redirect('companies')->with($notification);
        else
        return redirect('user/companies')->with($notification);
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy(Company $company)
    {
        $company->delete();
        $notification = array(
            'message' => 'Company deleted!',
            'alert-type' => 'success'
        );
        return redirect('companies')->with($notification);
    }
    
}
