<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Upload;
use Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = Content::where('content_type' ,'logo')
        ->where('status', 1)
        ->Orwhere('status', 2)
        ->orderBy('id','desc')->get();
        return view('admin.logo.index',compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.logo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      //  dd($request);
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
        $content = new Content;
        $content->content_type = 'logo';
        $content->user_id = Auth::user()->id;
        $content->name = $request->name;
        $content->slug = $request->slug;
        $content->status = $request->status;     
        //generate a new pagelink
        $result = (new LandingController)->generateLanding('content',200,$content->slug);
        if($result == 2){      
            if($content->save()){
                // upload new image
                if(!empty($request->file)){
                    Upload::createSingleUpload($request->file,$content->id);
                }  
            }  
        }
        return redirect('admin/logo');
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
        $content = Content::with('upload','Tag')->find($id);
        return view('admin.logo.edit',compact('content'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
             //dd($request->all());
             $content= Content::findOrfail($id);
             $content->user_id = Auth::user()->id;
             $content->name = $request->name;
             $content->slug = $request->slug;
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
                 // remove current image if requested
                 if(!empty($request->image_remove_id)){
                     Upload::unsetImageFromContent($request->image_remove_id);
                 }
                 // upload new image
                 if(!empty($request->file['item'])){
                     Upload::createSingleUpload($request->file,$content->id);
                 }
             }
             return redirect('admin/logo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $content= Content::findOrfail($id);
        $content->status = 4;
        $content->update();    
        return redirect()->back();
    }
}
