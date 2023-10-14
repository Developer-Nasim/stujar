<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ContentTag;

class Tag extends Model
{
    use HasFactory;
    public static function saveAssociatedTags($tags,$content_id = null){
        foreach($tags as $tag){
            // check existing tag
            $content_tag = ContentTag::where('content_id',$content_id)->where('tag_id',$tag)->get()->first();
            // save new content tag
            if(empty($content_tag->content_id)){
                $contentTag = new ContentTag();
                $contentTag->content_id = $content_id;
                $contentTag->tag_id = $tag;
                $contentTag->save();
            }
        }
        return true;
    }
    public static function removeAssociatedTags($tags,$content_id){
        // dd($tags,$content_id);
        foreach($tags as $tag){
            // dd($tag);
            // check existing tag
            $content_tag = ContentTag::where('content_id',$content_id)->where('tag_id',$tag)->get()->first();
            // dd($content_tag);
            // remove content tag
            if(!empty($content_tag->content_id)){
                ContentTag::where('content_id',$content_id)->where('tag_id',$tag)->delete();
            }
        }
        return true;
    }
    
}
