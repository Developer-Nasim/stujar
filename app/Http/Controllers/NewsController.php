<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Upload;
use App\Models\User;
use Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = Content::where('content_type' , 'news' )->orderBy('id','desc')->with('upload')->get();
        return view('admin.news.index',compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
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
        $content->content_type = 'news';
        $content->user_id = Auth::user()->id;
        $content->name = $request->name;
        $content->slug = $request->slug;
        $content->description=  $request->description;
        $content->meta_heading = $request->meta_heading;
        $content->meta_title = $request->meta_title;
        $content->meta_keywords = $request->meta_keywords;
        $content->meta_description = $request->meta_description;
        $content->meta_robots = $request->meta_robots;
        $content->meta_canonical = $request->meta_canonical;
        $content->meta_image = $request->meta_image; 
        $content->status = $request->status;  
        if($request->status == 1){$statusCode = 200;}else{$statusCode = 404;}
        //generate a new pagelink
        $result = (new LandingController)->generateLanding('news',$statusCode,$request->slug);
        if($result == 2){ 
            if($content->save()){
                // upload new image
                if(!empty($request->file)){
                    Upload::createSingleUpload($request->file,$content->id);
                }     
            }
        }  
        return redirect('admin/news');

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
          $content= Content::find($id);
          // dd($contents);
           return view('admin.news.edit',compact('content'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         //  dd($request->all());
         $content= Content::findOrfail($id);
         $content->user_id = Auth::user()->id;
         $content->name = $request->name;
         $content->slug = $request->slug;
         $content->description=  $request->description;
         $content->status = $request->status;    
         $content->meta_heading = $request->meta_heading;
         $content->meta_title = $request->meta_title;
         $content->meta_keywords = $request->meta_keywords;
         $content->meta_description = $request->meta_description;
         $content->meta_robots = $request->meta_robots;
         $content->meta_canonical = $request->meta_canonical;
         $content->meta_image = $request->meta_image; 
         if($request->status == 1){$statusCode = 200;}else{$statusCode = 404;}         
         if($content->save()){
            if($request->slug != $request->oldslug){
                $result = (new LandingController)->generateLanding('news',$statusCode,$request->slug);
                $result_new = (new LandingController)->addNextLanding('news',301,$request->oldslug,$request->slug);
            }
            else{
                $result = (new LandingController)->updateLanding('news',$statusCode,$request->slug);
            }

              // remove current image if requested
            if(!empty($request->image_remove_id)){
                Upload::unsetImageFromContent($request->image_remove_id);
            }
            // upload new image
            if(!empty($request->file['item'])){
                Upload::createSingleUpload($request->file,$content->id);
            }
            return redirect('admin/news');
         }
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
