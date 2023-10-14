<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Upload;
use App\Models\User;
use App\Http\Controllers\Landing;

use Auth;

class PressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = Content::where('content_type' , 'press' )->with(['Upload'])->orderBy('id','desc')->get();
        // dd($contents);
        return view('admin.press.index',compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $isExists = (new LandingController)->checkExistsPagelink($pageLink);
        // dd($isExists);
        return view('admin.press.create');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $content = new Content;
        $content->content_type = 'press';
        $content->user_id = Auth::user()->id;
        $content->name = $request->name;
        $content->slug = $request->slug;
        $content->status = $request->status;  

        if($request->status == 1){$statusCode = 200;}else{$statusCode = 404;}

        //generate a new pagelink
        $result = (new LandingController)->generateLanding('press',$statusCode,$request->slug);
        if($result == 2){
            if($content->save()){
                $image = $request->file('file');
                if($image)
                {
                    foreach ($image as $key => $value ){
                        $upload = new Upload;
                        $upload->user_id = $content->user_id;
                        $upload->content_id = $content->id;
                        $upload->name = $request->name;
                        $upload->caption =  $request->caption;
                        $upload->status = $content->status;
                        
                        $image_name= $value->getClientOriginalName();

                        $image_name = explode('.',$image_name);
                        $image_extention = end($image_name);
                        array_pop($image_name);
                        $image_name_string = implode('-',$image_name);
                        $upload_path_original = 'files/';
                        $upload_path = 'images/uploads/';
                        $image_url = $upload_path_original.$this->slugify($image_name_string).'.'.$image_extention;
                        $image_url_path = $upload_path_original.$this->slugify($image_name_string);
                        $image_full_name = $this->slugify($image_name_string).'.'.$image_extention;

                        // check already existing image name
                        $isImageName = Upload::where('file', 'LIKE', "%{$image_url_path}%")->get()->count();
                        if($isImageName > 0){
                            $image_url = $upload_path_original.$this->slugify($image_name_string).'-'.$isImageName.'.'.$image_extention;
                            $image_full_name = $this->slugify($image_name_string).'-'.$isImageName.'.'.$image_extention;
                        }
                        
                        $success = $value->move($upload_path_original, $image_full_name);
                        
                        $upload->file = $image_url;
                        // dd($upload);
                        $upload->save();
                    }
                }
                
                return redirect('admin/press');
            }
         return back()->withInput();
        }
        return back()->withInput();  
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
        $content = Content::findOrfail($id);
        return view('admin.press.edit',compact('content'));
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
        if($request->status == 1){$statusCode = 200;}else{$statusCode = 404;}
        
        if($request->slug != $request->oldslug){
            //slug has been changed
            //step1-generate new pagelink
            $result = (new LandingController)->generateLanding('content',$statusCode,$request->slug);
            //step2-add a redirection to new slug
            $result_new = (new LandingController)->addNextLanding('content',301,$request->oldslug,$request->slug);
        }else{
            $result = (new LandingController)->generateLanding('content',$statusCode,$request->slug);
        }


        if($content->update()){
        //     $upload = Upload::where('content_id',$content->id)->first();
        //    // dd($upload);
        //     $upload->user_id= $content->user_id;
        //     $upload->name=  $request->upload_name;
        //     $upload->url=  $request->url;
        //     $upload->status= $content->status;
        //     $upload->update();
            return redirect('admin/press');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      //  dd($id);
        $content= Content::findOrfail($id);
        $content->status = 3;
        $content->update();    
        return redirect()->back();
    }
    
}
