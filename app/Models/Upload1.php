<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','content_id','name','caption','description','video','file','url','status'];
 
    public function content()
    {
        return $this->belongsTo(Content::class);
    }
}
