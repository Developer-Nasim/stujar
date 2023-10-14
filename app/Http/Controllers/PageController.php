<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Upload;
use Auth; 

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = Content::where('content_type' , 'page' )->where('status','!=',5)->with('upload')->get();
        return view('admin.page.index',compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.page.create');
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
        $content->content_type = 'page';
        $content->user_id = Auth::user()->id;
        $content->name = $request->name;
        $content->slug = $request->slug;
        $content->summary = $request->summary;
        $content->description = $request->details;
        $content->meta_heading = $request->meta_heading;
        $content->meta_title = $request->meta_title;
        $content->meta_keywords = $request->meta_keywords;
        $content->meta_description = $request->meta_description;
        $content->meta_robots = $request->meta_robots;
        $content->meta_canonical = $request->meta_canonical;
        $content->meta_image = $request->meta_image;
        $content->status = $request->status;    
        //generate a new pagelink
        $result = (new LandingController)->generateLanding('page',200,$content->slug);
        if($result == 2){
            if($content->save()){  
                $upload = new Upload;
                $upload->user_id= $content->user_id;
                $upload->content_id= $content->id;
                $upload->name= 'page-image';
                $upload->status= $content->status;       
                $upload->url=  $request->url;  
                $upload->save();
            }
        }
        return redirect('admin/page');
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
        $content= Content::where('id',$id)->with('upload')->first();
      //  dd($content);
        return view('admin.page.edit',compact('content'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    //    dd($request->all());
       $content= Content::findOrfail($id);
       $content->content_type = 'page';
       $content->user_id = Auth::user()->id;
       $content->name = $request->name;
       $content->slug = $request->slug;
       $content->summary = $request->summary;
       $content->description = $request->details;
       $content->meta_heading = $request->meta_heading;
       $content->meta_title = $request->meta_title;
       $content->meta_keywords = $request->meta_keywords;
       $content->meta_description = $request->meta_description;
       $content->meta_robots = $request->meta_robots;
       $content->meta_canonical = $request->meta_canonical;
       $content->meta_image = $request->meta_image;
       $content->status = $request->status;   
        if($request->status == 1){$statusCode = 200;}else{$statusCode = 404;}       
        // generate a new pagelink
        // $result = (new LandingController)->generateLanding('page',200,$content->slug);
    //    dd($statusCode);
        if($content->save()){  
            if($request->slug != $request->oldslug){
                $result = (new LandingController)->generateLanding('page',$statusCode,$request->slug);
                $result_new = (new LandingController)->addNextLanding('page',301,$request->oldslug,$request->slug);
            }
            else{
                $result = (new LandingController)->updateLanding('page',$statusCode,$request->slug);
            }
            if(!empty($request->image_remove_id) && sizeof($request->image_remove_id)>0){
                foreach ($request->image_remove_id as $key => $value ){
                    if(!empty($value)){
                        Upload::unsetImageFromContent($value);
                    }
                }
            }
            $image = $request->file;
            // dd($image,$content->id);
            if($image){
                foreach ($image as $key => $value ){     
                    Upload::createSingleUpload($value,$content->id);
                }   
            } 
        }
       
       return redirect('admin/page');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $content= Content::findOrfail($id);
        $content->status = 5;
        $content->update();    
        return redirect()->back();
    }
}
