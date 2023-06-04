<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;
class Auth extends Controller
{
    public static function signinView(){
        return view('auth.signin');
    }

    public static function signupView(){
        return view('auth.signup');
    }

    public static function signup(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required | email | unique:users',
            'password' => 'required | min:8 | max:25 ',
            'telephone' => 'required | unique:users',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->telephone = $request->telephone;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if($res){
            return back() -> with('success','Successfull created account');
        }else{
            return back() -> with('fail','Something went wrong');
        }
    }

    public static function signin(Request $request){
        $request->validate([
            'email' => 'required | email',
            'password' => 'required'
        ]);

        $user = User::where('email',$request->email)->first();
        if($user){
            if(Hash::check( $request->password , $user->password) ){
                $request->session()->put('userId',$user->id);
                return redirect('dashboard');
            }else{
                return back() -> with('fail','Password is incorrect');
            }
        }else{
            return back()-> with('fail','The specified email was not found');
        }
    }

    public static function signout(){
        $session  = new Session();
        if($session->has('userId')){
            $session->remove('userId');
            return redirect('login');
        }
    }
}
