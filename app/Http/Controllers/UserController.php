<?php

namespace App\Http\Controllers;

use DB;
use Str;
use Auth;
use Hash;
use App\Role;
use App\User;
use App\Country;
use App\Traits\EmailTrait;
use App\Traits\SlugTrait;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $data['users'] = User::where('role_id', '!=', 1)->where('role_id', '!=', 4)->where('role_id', '!=', 5)->get();
        return view('admin.users.list', $data);
    }
    
    public function millionIndex()
    {
        $data['users'] = User::where('role_id', 4)->get();
        return view('admin.users.list', $data);
    }
    
    public function teamIndex()
    {
        $data['users'] = User::where('role_id', 5)->get();
        return view('admin.users.list', $data);
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $data['user'] = new User;
        $data['roles'] = Role::all();
        $data['countries'] = Country::all();
        return view('admin.users.form', $data);
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
        $input['image'] = isset($input['profile_avatar'])?$input['profile_avatar']:null; 
        $input['password'] = Hash::make($input['password']);
        $input['identity_token'] = Str::random(12, 'alphaNum');
        unset($input['profile_avatar_remove'], $input['_token'], $input['cpassword'], $input['profile_avatar']);
        try {
            DB::beginTransaction();
            if($input['image'] != null)
            {
                // uploadImage('image', name, 'folder', 'storage')
                $input['image'] = $this->uploadImage($input['image'], $input['name'] , '/uploads/users/', 'public');
                
            }
            else{
                $input['image'] = '';
            }
            
            $user = User::create($input);
            $this->sendMail(['name' => $request->name, 'email' => $request->email, 'password' => $request->password, 'role' => $user->role->slug], 'emails.admin-user');
            $notification = array(
                'message' => 'User created!',
                'alert-type' => 'success'
            );
            DB::commit();
        } catch (\Throwable $th) {
            $notification = array(
                'message' => 'Error Occured!',
                'alert-type' => 'error'
            );
            DB::rollback();
            return redirect()->back()->with($notification);
        }
        if($request->role_id == 2 || $request->role_id == 3){
            $redirect = '/users';
        }
        if($request->role_id == 4 ){
            $redirect = '/users/million-member';
        }
        if($request->role_id == 5 ){
            $redirect = '/users/team';
        }
        return redirect($redirect)->with($notification);
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
    public function edit($identity_token)
    {
        $data['user'] = User::where('identity_token', $identity_token)->first();
        $data['roles'] = Role::all();
        $data['countries'] = Country::all();
        return view('admin.users.form', $data);
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, User $user)
    {
        $input = $request->all();
        $input['image'] = isset($input['profile_avatar'])?$input['profile_avatar']:null;
        if($request->password !== null)
        $input['password'] = Hash::make($input['password']);
        else
        unset($input['password']);
        unset($input['profile_avatar_remove'], $input['_token'], $input['cpassword'], $input['profile_avatar']);
        try {
            DB::beginTransaction();
            if($input['image'] != null)
            {
                $input['image'] = $this->uploadImageUpdate($input['image'], $user , '/uploads/users/', 'public');
                
            }
            else{
                $input['image'] = $user->image;
            }
            $user = $user->update($input);
            if($request->password !== null){
                $this->sendMail(['name' => $request->name, 'email' => $request->email, 'password' => $request->password], 'emails.userupdate');
            }
            $notification = array(
                'message' => 'User updated!',
                'alert-type' => 'success'
            );
            DB::commit();
        } catch (\Throwable $th) {
            $notification = array(
                'message' => $th->getMessage(),
                'alert-type' => 'error'
            );
            DB::rollback();
            return redirect()->back()->with($notification);
        }
        if(Auth::user()->role->slug == 'admin'){
            if($request->role_id == 2 || $request->role_id == 3){
                $redirect = '/users';
            }
            if($request->role_id == 4 ){
                $redirect = '/users/million-member';
            }
            if($request->role_id == 5 ){
                $redirect = '/users/team';
            }
        }
        else{
            $redirect = '/dashboard';
        }
       
        return redirect($redirect)->with($notification);
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy(User $user)
    {
        $user->delete();
        $notification = array(
            'message' => 'User deleted!',
            'alert-type' => 'success'
        );
        return redirect('users')->with($notification);
    }
    
    public function checkIfUserExist(Request $request){
        // dump($request->all());
        $result = User::where('email', $request->email)->first();
        if($result)
        return response()->json(200);
        else
        return response()->json(404);
    }
}
