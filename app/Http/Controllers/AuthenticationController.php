<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siteoption;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;
use Auth;
use Illuminate\Support\Str;
use App\Models\School;
use App\Models\About;
use App\Models\Welcome;

class AuthenticationController extends Controller
{
    public function facebookLogin(Request $r) {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookCallback(Request $r) {
    $user = Socialite::driver('facebook')->stateless()->user();
     //dd($user);
    $finduser  = User::where('facebook_id', $user->id)->first();
        // if exiting user then login only.
    if($finduser) {
           // dd('not empty');
           Auth::login($finduser);
           return redirect('user/school');  
        }
        else{
          //  dd('not empty');
            $newUser = new User();
            $newUser->name = $user->user['name'];
            // if(!empty($user->user['email'])){
            //     $newUser->email = $user->user['email'];
            // }
            // else{
               
            // }
            $newUser->email = $user->user['id'].'@gmail.com';
            $newUser->facebook_id = $user->user['id'];
            $newUser->password = Hash::make($user->user['id']);
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
        
    }


    public function getWebSettings(){
        $siteoptions = Siteoption::select('okey','ovalue')->get()->toArray();
        $websettings = [];
        foreach($siteoptions as $key => $value){
            $websettings[$value['okey']] = $value['ovalue'];
        }
        return $websettings;
    }

    private function loginCustomer($c) {
        Session::put('user_id', $c->id);
        Session::put('email', $c->email);
        Session::put('name', $c->name);
    }

    public function user_dashboard(){
        $websettings = $this->getWebSettings();

        return view('user_dashboard',compact('websettings'));
    }
}
