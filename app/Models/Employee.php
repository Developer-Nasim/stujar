<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Employee extends Model
{
    use HasFactory;
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function content()
    {
        return $this->belongsToMany(Content::class);
    }
}
