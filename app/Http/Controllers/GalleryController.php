<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Content;
use App\Models\Member;
use App\Models\Upload;
use App\Models\Siteoption;
use Auth;
use App\Models\App;
use File;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = Content::where('content_type' , 'gallery' )->where('status', 1)->Orwhere('status', 0)->with('upload')->orderby('id','desc')->get();

        return view('admin.gallery.index',compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $content = new Upload;
        $content->caption = $request->caption;
        $content->user_id = $request->user_id;
        $content->slug = $request->slug;
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
            $isImageName = Upload::where('file', 'LIKE', "%{$image_full_name}%")->get()->count();
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
        $gallery = Upload::find($id);
        $websettings = $this->getWebSettings();
        return view('gallery.edit',compact('gallery','websettings'));
    }

  
 

    // this function will be added to helper
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $content= Upload::findOrfail($id); 
        $content->caption = $request->caption;
        $content->description = $request->description;
        if(!empty($request->file)){
         //dd('ok');
         if(!empty($content->file)){
            File::delete(public_path() . '/images/uploads/large/'.$content->file); // Delete old flyer
            File::delete(public_path() . '/images/uploads/small/'.$content->file); // Delete old flyer
            File::delete(public_path() . '/images/uploads/thumb/'.$content->file); // Delete old flyer
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
         $isImageName = Upload::where('file', 'LIKE', "%{$image_full_name}%")->get()->count();
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
        $content= Upload::findOrfail($id);
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
