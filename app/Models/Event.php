<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['event_type','user_id','title','slug','start_date','end_date','adress','location','logo','banner','description','entry_fee','status'];
}
