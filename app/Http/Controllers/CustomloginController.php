<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\School;
use App\Models\About;
use App\Models\Welcome;

class CustomloginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }  
      

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function schoolLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('user/school');
        }
        return redirect()->back()->withSuccess('Login details are not valid');
    }



    public function registration()
    {
        return view('admin.auth.register');
    }
      

    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->email =$request->email;
        $newUser->password = Hash::make($request->password);
        $newUser->role_id = 10;  
        $newUser->status = 10;  
        $newUser->save();

        $content = new School;
        $content->user_id = $newUser->id;
        $content->status = 1;
        $content->save();

        $welcome = new Welcome;
        $welcome->user_id = $newUser->id;
        $welcome->status = 1;
        $welcome->save();

        $about = new About;
        $about->user_id = $newUser->id;
        $about->status = 1;
        $about->save();

        Auth::login($newUser);
        return redirect('user/school');
    }


    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    

    public function dashboard()
    {
        if(Auth::check()){
            return view('home');
        }
  
        return redirect("admin/login")->withSuccess('You are not allowed to access');
    }
    

    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('admin/login');
    }
    public function signoutSchool() {
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }
}
