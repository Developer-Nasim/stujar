<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Upload;
use App\Models\User;
use Auth;
use Image;
use App\Models\Tag;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = Content::where('content_type' , 'video' )->where('status','!=', 4)->orderBy('id','desc')->with('upload')->get();
        return view('admin.video.index',compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.video.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
         $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
        $content = new Content;
        $content->name = $request->name;
        $content->slug = $request->slug;
        $content->content_type = 'video';
        $content->user_id = Auth::user()->id;
        $content->meta_heading = $request->meta_heading;
        $content->meta_title = $request->meta_title;
        $content->meta_keywords = $request->meta_keywords;
        $content->meta_description = $request->meta_description;
        $content->meta_robots = $request->meta_robots;
        $content->meta_canonical = $request->meta_canonical;
        $content->meta_image = $request->meta_image; 
        $content->status = $request->status; 
        $content->description = $request->description; 
        //generate a new pagelink
        $result = (new LandingController)->generateLanding('video',200,$content->slug);
        if($result == 2){  
            if($content->save()){
                $image = $request->file;
                if($image){
                    foreach ($image as $key => $value ){     
                        Upload::createSingleUpload($value,$content->id);
                    }   
                }          
            }
        }
        return redirect('admin/video');
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
        $content= Content::with('upload','Tag')->findOrfail($id);
        //dd($content);
        $videos = Upload::select('id','content_id','caption','video','file','url')->where('content_id', $id)->get();
        //dd($videos);
        return view('admin.video.edit',compact('content','videos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $content= Content::findOrfail($id);
        $content->name = $request->name;
        $content->slug = $request->slug;
        $content->content_type = 'video';
        $content->user_id = Auth::user()->id;
        $content->meta_heading = $request->meta_heading;
        $content->meta_title = $request->meta_title;
        $content->meta_keywords = $request->meta_keywords;
        $content->meta_description = $request->meta_description;
        $content->meta_robots = $request->meta_robots;
        $content->meta_canonical = $request->meta_canonical;
        $content->meta_image = $request->meta_image; 
        $content->status = $request->status; 
        $content->description = $request->description; 
        if($content->save()){
            if($request->status == 1){$statusCode = 200;}else{$statusCode = 404;}
            if($request->slug != $request->oldslug){
                $result = (new LandingController)->generateLanding('video',$statusCode,$request->slug);
                $result_new = (new LandingController)->addNextLanding('video',301,$request->oldslug,$request->slug);
            }elseif($request->status != 1){
                $result = (new LandingController)->updateLanding('video',$statusCode,$request->slug);
             }
            // remove requested image if requested
            if(!empty($request->image_remove_id) && sizeof($request->image_remove_id)>0){
                foreach ($request->image_remove_id as $key => $value ){
                    if(!empty($value)){
                        Upload::unsetImageFromContent($value);
                    }
                }                        
            }
            $image = $request->file;
            // dd($image);
            if($image){
                foreach ($image as $key => $value ){     
                    Upload::createSingleUpload($value,$content->id);
                }   
            }    
        }
        return redirect('admin/video');   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $content= Content::findOrfail($id);
        $content->status = 3;
        $content->update();    
        return redirect()->back();
    }
}
