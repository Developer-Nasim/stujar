<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Upload;
use App\Models\User;
use App\Models\Tag;
use Auth;

class ServiceController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function comments()
    {
        $contents = Content::where('content_type' , 'product' )->with('upload','Tag','Comment')->orderBy('id','desc')->paginate();
        // dd($contents);
        return view('admin.service.index',compact('contents'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = Content::where('content_type' , 'service' )->with('upload','Tag','Comment')->orderBy('id','desc')->paginate();
        // dd($contents);
        return view('admin.service.index',compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()    
    {
        $tags = Tag::where('tag_type',4)->where('status',1)->get();
        $tags_category = Tag::where('tag_type',3)->where('status',1)->get();
        // dd($tags_category );
        return view('admin.service.create',compact('tags','tags_category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $image = $request->file('file');
        // dd($image);
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $content = new Content;
        $content->content_type = 'product';
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
        $result = (new LandingController)->generateLanding('product',$statusCode,$request->slug);
        if($result == 2){ 
            if($content->save()){
                if(!empty($request->file['item'])){
                    Upload::createSingleUpload($request->file,$content->id);
                }
                if(!empty($request->tag)){
                    Tag::saveAssociatedTags($request->tag,$content->id);
                }
                return redirect('admin/product');
            }
            return redirect('admin/product');
        }
        return redirect('admin/product');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tags = Tag::where('tag_type',4)->get();
        $tags_category = Tag::where('tag_type',3)->get();
        $content = Content::with('upload','Tag')->find($id);
        // dd($content);
        return view('admin.service.show',compact('content','tags','tags_category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tags = Tag::where('tag_type',4)->get();
        $tags_category = Tag::where('tag_type',3)->get();
        $content = Content::with('upload','Tag')->find($id);
        // dd($content);
        return view('admin.service.edit',compact('content','tags','tags_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        
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
                $result = (new LandingController)->generateLanding('product',$statusCode,$request->slug);
                $result_new = (new LandingController)->addNextLanding('product',301,$request->oldslug,$request->slug);
            }
            else{
                $result = (new LandingController)->updateLanding('product',$statusCode,$request->slug);
            }
            // remove current image if requested
            if(!empty($request->image_remove_id)){
                Upload::unsetImageFromContent($request->image_remove_id);
            }
            // upload new image
            if(!empty($request->file['item'])){
                Upload::createSingleUpload($request->file,$content->id);
            }
            // remove associated tags
            if(!empty($request->removeTag)){
                // dd($request->removeTag);
                Tag::removeAssociatedTags($request->removeTag,$content->id);
            }
            // save associated tags
            if(!empty($request->tag)){
                Tag::saveAssociatedTags($request->tag,$content->id);
            }

            return redirect('admin/blog');
        }
        return redirect('admin/blog');
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
