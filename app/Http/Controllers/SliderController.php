<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Content;
use App\Models\Upload;
use App\Models\User;
use App\Http\Controllers\Landing;

use App\Models\Tag;

use Auth;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = Content::where('content_type' , 'slider' )->where('status', 1)->Orwhere('status', 2)->orderBy('id','desc')->get();
        return view('admin.slider.index',compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $isExists = (new LandingController)->checkExistsPagelink($pageLink);
        // dd($isExists);
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'summary' => 'required',
        ]);
        $content = new Content;
        $content->content_type = 'slider';
        $content->user_id = Auth::user()->id;
        $content->name = $request->name;
        $content->slug = $request->slug;
        $content->status = $request->status;  
        $content->summary = $request->summary;
        //dd($request);   
        //generate a new pagelink
        $result = (new LandingController)->generateLanding('content',200,$content->slug);
        if($result == 2){      
            if($content->save()){
                // upload new image
                $image = $request->file;
                // dd($image);
                if($image){
                    foreach ($image as $key => $value ){     
                        Upload::createSingleUpload($value,$content->id);
                    }   
                }  
            }  
        }
        return redirect('admin/slider');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tags = Tag::where('tag_type',4)->get();
        $tags_category = Tag::where('tag_type',3)->get();
        $content = Content::with('upload','Tag')->find($id);
        return view('admin.slider.edit',compact('content'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'summary' => 'required',
        ]);
      //dd($request->all());
        $content= Content::findOrfail($id);
        $content->user_id = Auth::user()->id;
        $content->name = $request->name;
        $content->slug = $request->slug;
        $content->summary = $request->summary;
        $content->status = $request->status;
        if($content->save()){
            if($request->slug != $request->oldslug){
                //slug has been changed
                //step1-generate new pagelink
                if($request->status == 1){$statusCode = 200;}else{$statusCode = 404;}
                $result = (new LandingController)->generateLanding('content',$statusCode,$request->slug);
                //step2-add a redirection to new slug
                $result_new = (new LandingController)->addNextLanding('content',301,$request->oldslug,$request->slug);
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
        // dd($image,$content->id);
        if($image){
            foreach ($image as $key => $value ){     
                Upload::createSingleUpload($value,$content->id);
            }   
        }
        }
        return redirect('admin/slider');
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
