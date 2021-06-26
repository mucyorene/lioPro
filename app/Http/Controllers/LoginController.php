<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Projects;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function loginPage(){
        return view('admin.login');
    }
    public function dRegisteration(){
        return view('admin.dummyReg');
    }

    public function listProject(){
        $listAll = Projects::all();
        $data = ['loggedUser'=>Admin::where('id','=',session('loggedUser'))->first()];
        return view('admin.projects',$data)->with('data',$listAll);
    }

    public function dummies(Request $request){
        $request->validate([
            'names'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:5|max:15'
        ]);

        $reg = new Admin();
        $reg->names = $request->names;
        $reg->email = $request->email;
        $reg->password = Hash::make($request->password);
        $reg->save();
        return back();
    }

    public function authantication(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:15'
        ]);

        $info = Admin::where('email','=',$request->email)->first();
        if (!$info) {
            return back()->with('fail','We do not recognize your email');
        }
        else {
            if (Hash::check($request->password,$info->password)) {
               $request->session()->put('loggedUser',$info->id);
               return redirect('/listProjects');
            }else{
                return back()->with('fail','Incorrect password');
            }
        }

    }
    public function logouts(){
        if (session()->has('loggedUser')) {
            session()->pull('loggedUser');
            return redirect('/login');
        }
    }
}
