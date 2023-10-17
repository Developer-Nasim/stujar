<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Siteoption;
use Session;
use App\Models\App;
use Intervention\Image\Facades\Image;
use DB;
use File;


class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $websettings = $this->getWebSettings();
        return view('user_dashboard',compact('websettings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

      //  dd($request);
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $content = new School;
        $content->user_id = $request->user_id;
        $content->name = $request->name;
        $content->slug = Str::slug($request->name, '-');
        $content->eiin =  $request->eiin;
        $content->established = $request->established;
        $content->phone = $request->phone;
        $content->address = $request->address;
        $content->status = 1;
        if($content->save()){
            return redirect('user/school')->with('success','Successfully created School '); 
        }
        else{
            dd('not ok');
        }  
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|unique:schools|max:255',
        ]);
       // dd($request->all());
        $content= School::findOrfail($id);
        $content->user_id = $request->user_id;
        $content->name = $request->name;
        $content->slug = Str::slug($request->name, '-');
        $content->eiin =  $request->eiin;
        $content->established = $request->established;
        $content->phone = $request->phone;
        $content->address = $request->address;
        $content->status = 1;

        if(!empty($request->file)){
            //dd('ok'); 
            if(!empty($content->file)){
                File::delete(public_path() . '/images/uploads/large/'.$content->file); // Delete old flyer
                File::delete(public_path() . '/images/uploads/small/'.$content->file); // Delete old flyer
                File::delete(public_path() . '/images/uploads/thumb/'.$content->file); // Delete old flyer
                 // dd($delete);
            }
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
            $isImageName = School::where('file', 'LIKE', "%{$image_full_name}%")->get()->count();
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
            $content->file = $image_full_name;

        }
        if(!empty($request->logo)){
            //dd('ok'); 
             if(!empty($content->logo)){
                File::delete(public_path() . '/images/uploads/large/'.$content->logo); // Delete old flyer
                File::delete(public_path() . '/images/uploads/small/'.$content->logo); // Delete old flyer
                File::delete(public_path() . '/images/uploads/thumb/'.$content->logo); // Delete old flyer
            }
            $image_name= $request->logo->getClientOriginalName();
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
            $isImageName = School::where('logo', 'LIKE', "%{$image_full_name}%")->get()->count();
            // dd($isImageName);
            if($isImageName > 0){
                $image_url = $upload_path_original.App::slugify($image_name_string).'-'.$isImageName.'.'.$image_extention;
                $image_full_name = App::slugify($image_name_string).'-'.$isImageName.'.'.$image_extention;
            }
            // dd($image_url);
            $success = $request->logo->move($upload_path_original, $image_full_name);           
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
            $content->logo = $image_full_name;

        }

        if($content->save()){
            return redirect('user/school',)->with('success','Successfully created School '); 
        }
        else{
            dd('not ok');
        }  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getWebSettings(){
        $siteoptions = Siteoption::select('okey','ovalue')->get()->toArray();
        $websettings = [];
        foreach($siteoptions as $key => $value){
            $websettings[$value['okey']] = $value['ovalue'];
        }
        return $websettings;
    }
    public function school_create($name){
    //   dd($name);
    $school= '';
    $websettings = $this->getWebSettings();
    $school= School::where('slug',$name)->where('status', 1 )->first();
    if($school == null){
        return view('four-zero-four');
      }
    if($school->status == 1){  
          $teachers = DB::table('teachers')->where('slug',$name)->where('status' , 1 )->orderBy('id','desc')->paginate(12);
          $welcome = DB::table('welcomes')->where('slug',$name)->where('status' , 1 )->orderBy('id','desc')->first();
          $messages = DB::table('messages')->where('slug',$name)->where('status' , 1 )->orderBy('id','desc')->paginate(12);
          $notices = DB::table('notices')->where('slug',$name)->where('status' , 1 )->orderBy('id','desc')->paginate(12);
          $events = DB::table('events')->where('slug',$name)->where('status' , 1 )->orderBy('id','desc')->paginate(12);
          $gallaries = DB::table('uploads')->where('slug',$name)->where('status' , 1 )->orderBy('id','desc')->paginate(12);
          $about = DB::table('abouts')->where('slug',$name)->where('status' , 1 )->orderBy('id','desc')->first();
          //dd($school);
          return view('school',compact('websettings','school','welcome','teachers','messages','notices','events','gallaries','about'));
      }
      else{
          return view('four-zero-four');
      }



    //   $trm_slug = trim($name);
    //   $websettings = $this->getWebSettings();
    //   $school= School::where('slug',$trm_slug)->where('status', 1 )->first();
    //   if($school->status == 1){  
    //         $teachers = DB::table('teachers')->where('user_id', $school->user_id)->where('status' , 1 )->orderBy('stuff_type','ASC')->paginate(12);
    //         $welcome = DB::table('welcomes')->where('user_id', $school->user_id)->where('status' , 1 )->orderBy('id','desc')->first();
    //         $messages = DB::table('messages')->where('user_id', $school->user_id)->where('status' , 1 )->orderBy('id','desc')->paginate(12);
    //         $notices = DB::table('notices')->where('user_id', $school->user_id)->where('status' , 1 )->orderBy('id','desc')->paginate(12);
    //         $events = DB::table('events')->where('user_id', $school->user_id)->where('status' , 1 )->orderBy('id','desc')->paginate(12);
    //         $gallaries = DB::table('uploads')->where('user_id', $school->user_id)->where('status' , 1 )->orderBy('id','desc')->paginate(12);
    //         $about = DB::table('abouts')->where('user_id', $school->user_id)->where('status' , 1 )->orderBy('id','desc')->first();
    //         //dd($school);
    //         return view('school',compact('websettings','school','welcome','teachers','messages','notices','events','gallaries','about'));
    //     }
    //     else{
    //         return view('four-zero-four');
    //     }
    }

    public function changeStatus(Request $request)
    {
        $user = School::find($request->user_id);
        $user->status = $request->status;
        $user->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }
}
