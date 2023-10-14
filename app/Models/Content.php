<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Content extends Model
{
  use HasFactory;
  protected $fillable = ['user_id','name','subtitle','slug','meta_title','meta_keywords','meta_des','canonical_url','description','summary','note','content_index','barcode','status'];

  public function upload(){
    return $this->hasMany('App\Models\Upload', 'content_id');
  }
  
  public function comment(){
    return $this->hasMany('App\Models\Comment', 'content_id');
  }

  public function content_employee(){
    return $this->hasMany('App\Models\ContentEmployee', 'content_id');
  }

  public function tag(){
    return $this->belongsToMany(Tag::class, 'content_tag');
  }

  public function employee()
  {
      return $this->belongsToMany(Employee::class, 'content_employee');
  }
  public function member()
  {
      return $this->belongsTo(Member::class);
  }

  /**
     * Get all of the content's comments.
     */
    // public function comments()
    // {
    //     return $this->morphMany(Comment::class, 'commentable');
    // }
    public function comments()
    {
        return $this->morphMany('Comment', 'commentable');
    }

    // results in a "problem", se examples below
    public function active_comments() {
      return $this->comments()->where('status','=', 1);
    }
    
}