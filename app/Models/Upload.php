<?php

namespace App\Models;

use Auth;
use App\Models\App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;

class Upload extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','content_id','name','caption','description','video','file','url','status'];
 
    public function content()
    {
        return $this->belongsTo(Content::class);
    }

    public static function unsetImageFromContent($upload_id){
        $upload = Upload::findOrfail($upload_id);
        $upload->content_id = null;
        $upload->status = 4;
        $upload->save();
        return true;
    }
    public static function createSingleUpload($file,$content_id = null){

        // if(!empty($file['item'])){
        //     $image_name= $file['item']->getClientOriginalName();
        //     $image_name = explode('.',$image_name);
        //     $image_extention = end($image_name);
        //     if($image_extention != 'webp'){
        //         return false;
        //     }
        // }
        
        $upload = new Upload;
        $upload->user_id= Auth::user()->id;
        if(!empty($content_id)){
            $upload->content_id=  $content_id;
        }
        if(empty($file['name'])){
            $upload->name= 'Media Upload';
        }else{
            $upload->name= $file['name'];
        }
        if(!empty($file['caption'])){
            $upload->caption=  $file['caption'];
        }
        if(!empty($file['description'])){
            $upload->description=  $file['description'];
        }
        if(!empty($file['url'])){
            $upload->url=  $file['url'];
        }
        if(!empty($file['video'])){
            $upload->video=  $file['video'];
        }

        // dd($upload);
        // if uploaded data exists
        if(!empty($file['item'])){
            $image_name= $file['item']->getClientOriginalName();
            // dd($image_name);
            $image_name = explode('.',$image_name);
            $image_extention = end($image_name);
            array_pop($image_name);
            $image_name_string = implode('-',$image_name);
            $upload_path_original = 'images/uploads/large/';
            $upload_path = 'images/uploads/';
            $image_url = $upload_path_original.App::slugify($image_name_string).'.'.$image_extention;
            $image_url_path = $upload_path_original.App::slugify($image_name_string);
            $image_full_name = App::slugify($image_name_string).'.'.$image_extention;


            // dd($image_url_path);
            // check already existing image name
            $isImageName = Upload::where('file', 'LIKE', "%{$image_full_name}%")->get()->count();
            // dd($isImageName);
            if($isImageName > 0){
                $image_url = $upload_path_original.App::slugify($image_name_string).'-'.$isImageName.'.'.$image_extention;
                $image_full_name = App::slugify($image_name_string).'-'.$isImageName.'.'.$image_extention;
            }
            // dd($image_url);
            $success = $file['item']->move($upload_path_original, $image_full_name);           
            // dd($upload);
            if($success){
                $sizes = [200, 480];
                $size_name = ['thumb', 'small'];
                for($i = 0; $i < 2; $i++) {
                    $image = Image::make($upload_path_original. $image_full_name);
                    $image->widen($sizes[$i]);
                    $image->save($upload_path .$size_name[$i].'/'. $image_full_name);
                }
            }
            $upload->file = $image_full_name;
        }
        if(!empty($upload->file) || !empty($upload->url) || !empty($upload->video)){
            $upload->status= 1;
            $upload->save();
            return $image_full_name;
        }else{
            return false;
        }       
    }
}
