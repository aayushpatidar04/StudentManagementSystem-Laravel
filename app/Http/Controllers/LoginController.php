<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use DataTables;
use Illuminate\Support\Facades\DB;
use Ixudra\Curl\Facades\Curl;

use App\Models\crud;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }
    public function welcome(Request $request){
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ]
            );

        if ($request->isMethod('post')) {

            $user = \DB::table('crud')->where('email',$request->email)->first();
            if($user){
                
                Session::put('user',$user);
                // dd(Session::get('user'));
                if($user->role=='admin'){
                    return redirect()->route('admin');
                }elseif($user->role=='admission'){
                    return redirect()->route('admission');
                }elseif($user->role=='teacher'){
                    return redirect()->route('teacher');
                }elseif($user->role=='student'){
                    return redirect()->route('student');
                }else{
                    return redirect()->route('login');
                }
            }
        }
    }

    public function admin(){
        if(Session::has('user')){
            return view('admin');
        }else{
            return redirect()->route('login');
        }
    }

    public function admission(){
        if(Session::has('user')){
            return view('admission');
        }else{
            return redirect()->route('login');
        }
    }

    public function student(){
        if(Session::has('user')){
            return view('student');
        }else{
            return redirect()->route('login');
        }
    }

    public function teacher(){
        if(Session::has('user')){
            return view('teacher');
        }else{
            return redirect()->route('login');
        }
    }

    public function register(){
        return view('register');
    }
    public function formsave(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'cpassword' => 'required|same:password',
                'userimg' => 'required',

            ]
        );
        $s = explode(".",$request->email);
        $a = $s[0];
        $filename = $a . "." . $request->file('userimg')->getClientOriginalExtension();
        $file = $request->file('userimg');
        $file->move('UserImages/', $filename);
        $user = new crud;
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->userimage = $filename ;
        $user->save();

        return redirect('login');

    }

    public function logout(){
        Session::flush();
        return redirect()->route('login');
    }
}
