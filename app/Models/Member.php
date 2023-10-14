<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    public function employee(){
        return $this->hasMany('App\Models\Employee', 'member_id');
    }
    public function branch(){
        return $this->hasMany('App\Models\Branch', 'member_id');
    }
    public function content(){
        return $this->hasMany('App\Models\Content', 'member_id');
    }
}