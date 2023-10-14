<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Siteoption;
use App\Models\App;
use Intervention\Image\Facades\Image;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $content = new Message;
        $content->name = $request->name;
        $content->user_id = $request->user_id;
        $content->slug = $request->slug;
        $content->position = $request->position;
        $content->message = $request->message;
        $content->status = 1;
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
            $isImageName = Message::where('file', 'LIKE', "%{$image_full_name}%")->get()->count();
            // dd($isImageName);
            if($isImageName > 0){
                $image_url = $upload_path_original.App::slugify($image_name_string).'-'.$isImageName.'.'.$image_extention;
                $image_full_name = App::slugify($image_name_string).'-'.$isImageName.'.'.$image_extention;
            }
            //dd($image_url);
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
        $message = Message::find($id);
        $websettings = $this->getWebSettings();
        return view('message.edit',compact('message','websettings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $content= Message::findOrfail($id); 
        $content->name = $request->name;
        $content->position = $request->position;
        $content->message = $request->message;
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
         $isImageName = Message::where('file', 'LIKE', "%{$image_full_name}%")->get()->count();
         // dd($isImageName);
         if($isImageName > 0){
             $image_url = $upload_path_original.App::slugify($image_name_string).'-'.$isImageName.'.'.$image_extention;
             $image_full_name = App::slugify($image_name_string).'-'.$isImageName.'.'.$image_extention;
         }
         //dd($image_url);
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
        $content= Message::findOrfail($id);
        $content->delete();    
        return redirect()->back();
    }
    public function getWebSettings(){
        $siteoptions = Siteoption::select('okey','ovalue')->get()->toArray();
        $websettings = [];
        foreach($siteoptions as $key => $value){
            $websettings[$value['okey']] = $value['ovalue'];
        }
        return $websettings;
    }
}
