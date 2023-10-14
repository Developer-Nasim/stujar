<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','parent','commentable_id','commentable_type','name','email','phone','description','status'];

    /**
     * Get the parent commentable model (content, member).
     */
    public function content()
    {
        return $this->belongsTo(Content::class);
    }

}

