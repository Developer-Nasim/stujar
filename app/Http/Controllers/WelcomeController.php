<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Welcome;
use App\Models\Subscribe;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use App\Models\Member;
use Auth;
use App\Models\User;
use App\Models\Employee;
use App\Models\App;
use Intervention\Image\Facades\Image;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // dd('Welcome');
       $welcome = Welcome::get();
        return view('admin.welcome.index',compact('welcome'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.welcome.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'text_one' => 'max:255',
            'text_two' => 'required',
            'welcome_ticker' => 'required',
        ]);
        Welcome::create($request->all());
        return redirect('admin/welcome');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $welcome= Welcome::findOrfail($id);
        return view('admin.welcome.edit',compact('welcome'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $welcome= Welcome::findOrfail($id);
        $welcome->title= $request->title;
        $welcome->user_id= $request->user_id;
        $welcome->slug = $request->slug;
        $welcome->description= $request->description;
        $welcome->status= 1;
        if(!empty($request->file)){
            //dd('ok');
   
            $image_name= $request->file->getClientOriginalName();
            //dd($image_name);
            $image_name = explode('.',$image_name);
            $image_extention = end($image_name);
            array_pop($image_name);
            $image_name_string = implode('-',$image_name);
            $upload_path_original = 'images/uploads/large/';
            $upload_path = 'images/uploads/';
            $image_url = $upload_path_original.App::slugify($image_name_string).'.'.$image_extention;
            $image_url_path = $upload_path_original.App::slugify($image_name_string);
            $image_full_name = App::slugify($image_name_string).'.'.$image_extention;
            // dd($image_url_path);
            // check already existing image name
            $isImageName = Welcome::where('file', 'LIKE', "%{$image_full_name}%")->get()->count();
            // dd($isImageName);
            if($isImageName > 0){
                $image_url = $upload_path_original.App::slugify($image_name_string).'-'.$isImageName.'.'.$image_extention;
                $image_full_name = App::slugify($image_name_string).'-'.$isImageName.'.'.$image_extention;
            }
            // dd($image_url);
            $success = $request->file->move($upload_path_original, $image_full_name);           
            // dd($upload);
            if($success){
                $sizes = [200, 480];
                $size_name = ['thumb', 'small'];
                for($i = 0; $i < 2; $i++) {
                    $image = Image::make($upload_path_original. $image_full_name);
                    $image->widen($sizes[$i]);
                    $image->save($upload_path .$size_name[$i].'/'. $image_full_name);
                }
            }
            $welcome->file = $image_full_name;

        }
        $welcome->update();
        return redirect('user/school',)->with('success','Successfully created School '); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $welcome= Welcome::where('id', $id)->delete();
        return redirect()->back();
    }

    //email subscriptions
    public function subscribe_store(Request $request)
    {
      //  dd($request->all());
      $validated = $request->validate([
        'email' => 'required'
        ]);
    
        $subscribe = new Subscribe;
        $subscribe->subscribe_type = 'email';
        $subscribe->email = $request->email;
        $subscribe->status = 1;
        $subscribe->save();

        return redirect()->back()->with('subscribe', 'Successfully Subscribed !!!');

    }
    public function subscribers(){
        $subscribes = Subscribe::where('status',1)->get();
        return view('admin.subscribers',compact('subscribes'));
    }
    public function home(){
        
        return view('home');
    }

    public function four_zero_four(){
        // dd('ok');
        return view('four-zero-four');
    }

    public function excel(){
        $members = Excel::toArray(new WelcomeController, 'member2.xlsx');
        // dd($members);   
        array_pop($members);
        // dd($members);
        //  array_shift( $members);
        //  dd($members);
        $members= $members[0];
        //dd($members);
         array_shift( $members);
        //dd($members);
        $i = $j = $k = 1;
         // create a new company here
         foreach($members as $key => $member){
            // dd($member);
            //create new user account
            $user = new User;
            $user->name = $member[2];
            if(!empty($member[8])){
                $user->email = $member[8];
            }
            else{
                $user->email = $this->slugify($member[2]).'@bcscomputercity.org.bd';
            }
            $user->role_id = 7;
            $password= 'bcscomputercity2023';
            $user->password = Hash::make($password);
            $user->status = 1;            
            $user->save();

            //create new member
            $memberinsert = new Member;
            $memberinsert->user_id = $user->id;
            $memberinsert->created_by = Auth::user()->id;
            $memberinsert->title = $member[2];
            $memberinsert->slug = $this->slugify($member[2]);
            $memberinsert->floorCentral = $member[3];
            $memberinsert->status = 1;
            if($memberinsert->status == 1){$statusCode = 200;}else{$statusCode = 404;}
            $result = (new LandingController)->generateLanding('member',$statusCode,$memberinsert->slug);
            if($result == 2){
                if($memberinsert->save()){
                   $j++;
                   //create new employee
                   if(!empty($member[20])){
                        $employee = new Employee;
                        $employee->member_id =  $memberinsert->id;
                        $employee->user_id =  $memberinsert->user_id;
                        $employee->created_by = Auth::user()->id;
                        $employee->name = $member[20];
                        $employee->slug = $this->slugify($member[20]);
                        $employee->designation = $member[21];
                        $employee->profilePhoto = null;
                        $employee->contact = $member[23];
                        $employee->email = $member[22];
                        $employee->website = $member[24];
                        $employee->about = null;
                        $employee->bloodGroup = null;
                        $employee->status = 1;    
                        
                        if($employee->status == 1){$statusCode = 200;}else{$statusCode = 404;}
                        //generate a new pagelink
                        $result = (new LandingController)->generateLanding('employee',$statusCode,$employee->slug);
                        if($result == 2){
                            if($employee->save()){
                                $k++;
                            }
                        }
                   }
                   
                } 
            }
        
            $i++;
                
        }

        dd('done:',$i,'member:',$j, 'employee:',$k);

    }

    public static function slugify($text, string $divider = '-')
    {
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }


    public function fb_login(){
        dd('ok');
    }

}
