<?php

namespace App\Http\Controllers;


use DB;
use Str;
use Auth;
use App\Role;
use App\User;
use App\Traits\EmailTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class MyAuthController extends Controller
{
    use EmailTrait;

    public function login(){
        $data['title'] = 'Login | Eat, Drink and Enjoy';
        return view('auth.login', $data);
    }

    public function register(){
        $data['title'] = 'Register | Eat, Drink and Enjoy';
        $data['roles'] = Role::where('id', '!=', 1)->get();
        return view('auth.basic-register', $data);
    }

    public function store(Request $request){
        try {
            DB::beginTransaction();
            $user = new User;
            $user->role_id = $request->role_id;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->identity_token = Str::random(12, 'alphaNum');
            $user->save();
            DB::commit();
            $this->sendMail(['name' => $request->name, 'email' => $request->email, 'password' => $request->password, 'role' => $user->role->slug], 'emails.basic-register');
            if(Auth::user() === null){
                Auth::loginUsingId($user->id);    
            }
            
            $notification = array(
                'message' => 'Registered Successfully',
                'alert-type' => 'success'
            );
        } catch (\Throwable $th) {
            DB::rollback();
            $notification = array(
                'message' => 'Some error occured',
                'alert-type' => 'error'
            );
            $redirect = 'register';
        }
        return redirect('/home')->with($notification);
    }
}
