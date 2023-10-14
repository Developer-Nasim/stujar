<?php

namespace App\Http\Controllers;
use App\Models\Upload;
use Illuminate\Http\Request;
use Auth;
use App\Models\Siteoption;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{
    public function index()
    {
        $websettings = $this->getWebSettings();
        $uploads = Upload::orderBy('id','desc')->paginate(20);
        return view('admin.upload.index',compact('uploads','websettings'));
    }
    
    public function search(Request $request)
    {
        $searchTerm = $request->name;
        $websettings = $this->getWebSettings();
        $uploads = Upload::where('name', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('file', 'LIKE', "%{$searchTerm}%") 
                    ->orWhere('caption', 'LIKE', "%{$searchTerm}%") 
                    ->orderBy('id','desc')
                    ->paginate(20);
        return view('admin.upload.search',compact('uploads','websettings'));
    }

   /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $image = $request->file('file');
        if(!empty($image))
        {
            foreach ($image as $key => $value ){
                $upload = new Upload;
                $upload->user_id= Auth::user()->id;
                // dd($request);
                if(empty($request->name)){
                    $upload->name= 'Media Upload';
                }else{
                    $upload->name= $request->name;
                }
                
                $upload->caption=  $request->caption;
                $upload->description =  $request->description;
                $upload->status= 1;

                $image_name= $value->getClientOriginalName();
                $image_name = explode('.',$image_name);
                $image_extention = end($image_name);
                array_pop($image_name);
                $image_name_string = implode('-',$image_name);
                $upload_path_original = 'images/uploads/large/';
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
                $sizes = [200, 480];
                $size_name = ['thumb', 'small'];
                for($i = 0; $i < 2; $i++) {
                    $image = Image::make($upload_path_original. $image_full_name);
                    $image->widen($sizes[$i]);
                    $image->save($upload_path .$size_name[$i].'/'. $image_full_name);
                }
                if($success){
                    $upload->file = $image_full_name;
                    $upload->save();
                }
            }
        }
        return redirect('admin/upload');
    }

    // this function will be added to helper
    public function getWebSettings(){
        $siteoptions = Siteoption::select('okey','ovalue')->get()->toArray();
        $websettings = [];
        foreach($siteoptions as $key => $value){
            $websettings[$value['okey']] = $value['ovalue'];
        }
        return $websettings;
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
}
