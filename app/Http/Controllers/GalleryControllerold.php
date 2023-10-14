<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Content;
use App\Models\Upload;
use App\Models\User;
use Auth;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = Content::where('content_type' , 'gallery' )->where('status', 1)->Orwhere('status', 0)->with('upload')->get();
        // dd($contents);
        // foreach($contents as $content){
        //     $galleryImages = Upload::select('content_id','caption','file')->where('content_id', $content->id)->get();
        //    // dd($galleryImages);
        // } 
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
        // dd($request->all());
            $validated = $request->validate([
                'name' => 'required',
                'slug' => 'required',
            ]);
            $content = new Content;
            $content->name = 'gallery';
            $content->slug = $request->slug;
            $content->content_type = 'gallery';
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
            $result = (new LandingController)->generateLanding('gallery',200,$content->slug);
            if($result == 2){   
                if($content->save()){
                    $image = $request->file('file');
                    if($image)
                    {
                        foreach ($image as $key => $value ){
                            $upload = new Upload;
                            $upload->user_id= $content->user_id;
                            $upload->content_id= $content->id;
                            $upload->name= 'gallery_upload';
                            $upload->caption=  $request->caption;
                            $upload->status= $content->status;
                            $image_name= $value->getClientOriginalName();
                            $image_full_name = $image_name;
                            $upload_path_original = 'images/gallery/large/';
                            $upload_path = 'images/gallery/';
                            $image_url = $upload_path_original.$image_full_name;
                            $success = $value->move($upload_path_original, $image_full_name);
                            $sizes = [200, 480];
                            $size_name = ['thumb', 'small'];
                            for($i = 0; $i < 2; $i++) {
                            //  dd($upload_path. $image_full_name);
                                $image = Image::make($upload_path_original. $image_full_name);
                                $image->widen($sizes[$i]);
                                $image->save($upload_path .$size_name[$i].'/'. $image_full_name);
                            }
                            if($success)
                            {
                                $upload->file = $image_url;
                                $upload->save();
                            }
                        }
                    }              
                }
            }
        return redirect('admin/gallery');
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
        $contents= Content::findOrfail($id);
        $galleryImages = Upload::select('id','content_id','caption','file')->where('content_id', $id)->get();
        //dd($galleryImages);
        return view('admin.gallery.edit',compact('contents','galleryImages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $content= Content::findOrfail($id);
        $content->user_id = Auth::user()->id;
        $content->name = $request->name;
        $content->slug = $request->slug;
        $content->meta_heading = $request->meta_heading;
        $content->meta_title = $request->meta_title;
        $content->meta_keywords = $request->meta_keywords;
        $content->meta_description = $request->meta_description;
        $content->meta_robots = $request->meta_robots;
        $content->meta_canonical = $request->meta_canonical;
        $content->meta_image = $request->meta_image; 
        $content->status = $request->status;  

        if($content->save()){
            if($request->status == 1){$statusCode = 200;}else{$statusCode = 404;}
            if($request->slug != $request->oldslug){
                $result = (new LandingController)->generateLanding('gallery',$statusCode,$request->slug);
                $result_new = (new LandingController)->addNextLanding('gallery',301,$request->oldslug,$request->slug);
            }elseif($request->status != 1){
                $result = (new LandingController)->updateLanding('gallery',$statusCode,$request->slug);
             }

            $image = $request->file('file');
            if($image)
            {
                foreach ($image as $key => $value ){
                    $upload = new Upload;
                    $upload->user_id= $content->user_id;
                    $upload->content_id= $content->id;
                    $upload->name= 'gallery_upload';
                    $upload->caption=  $request->caption;
                    $upload->status= $content->status;
                    $image_name= $value->getClientOriginalName();
                    $image_full_name = $image_name;
                    $upload_path_original = 'images/gallery/large/';
                    $upload_path = 'images/gallery/';
                    $image_url = $upload_path_original.$image_full_name;
                    $success = $value->move($upload_path_original, $image_full_name);
                    $sizes = [400, 500];
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
                }
            }
        }
        
        return redirect('admin/gallery');   

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
