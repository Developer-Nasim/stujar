<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Content;
use App\Models\Upload;
use App\Models\User;
use App\Http\Controllers\Landing;

use Auth;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = Content::where('content_type' , 'slider' )->where('status', 1)->Orwhere('status', 0)->get();
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
        //dd($request->all());
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $content = new Content;
        $content->content_type = 'slider';
        $content->user_id = Auth::user()->id;
        $content->name = $request->name;
        $content->slug = $request->slug;
        $content->status = $request->status;    
        
        //generate a new pagelink
        $result = (new LandingController)->generateLanding('content',200,$content->slug);
        if($result == 2){      
            if($content->save()){
                $image = $request->file('file');
                $upload = new Upload;
                if($image){
                    $upload->user_id= $content->user_id;
                    $upload->content_id= $content->id;
                    $upload->name= 'slider';
                    $upload->url= $request->url;
                    $upload->status= $content->status;
                    $image_name= $image->getClientOriginalName();
                    $image_full_name = $image_name;
                   // dd($image_full_name);
                    $upload_path_original = 'images/slider_image/large/';
                    $upload_path = 'images/slider_image/';
                    $image_url = $image_full_name;
                    $success = $image->move($upload_path_original, $image_full_name);
                    $sizes = [800, 1600];
                    $size_name = ['thumb', 'small'];
                    for($i = 0; $i < 2; $i++) {
                        $image = Image::make($upload_path_original. $image_full_name);
                        $image->widen($sizes[$i]);
                        $image->save($upload_path .$size_name[$i].'/'. $image_full_name);
                    }
                    if($success)
                    {
                        $upload->file = $image_url;
                        $upload->save();
                    }
                    $upload->save();                
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
        $contents= Content::findOrfail($id);
        return view('admin.slider.edit',compact('contents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

      //  dd($request->all());
        $content= Content::findOrfail($id);
        $content->user_id = Auth::user()->id;
        $content->name = $request->name;
        $content->slug = $request->slug;
        $content->status = $request->status;    
         
        //generate a new pagelink
        // $result = (new LandingController)->generateLanding('contents',200,$content->slug);
        // if($result == 2){

        // }
        if($request->slug != $request->oldslug){
            //slug has been changed
            //step1-generate new pagelink
            if($request->status == 1){$statusCode = 200;}else{$statusCode = 404;}
            $result = (new LandingController)->generateLanding('content',$statusCode,$request->slug);
            //step2-add a redirection to new slug
            $result_new = (new LandingController)->addNextLanding('content',301,$request->oldslug,$request->slug);
        }

        if($content->update()){
            $upload = Upload::where('content_id',$content->id)->first();
           // dd($upload);
            $upload->user_id= $content->user_id;
            $upload->name=  'slider';
            $upload->url=  $request->url;
            $upload->status= $content->status;
            $upload->update();
            return redirect('admin/slider');
        }
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
