<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    public function user_profile()
    {
       return $this->belongsTo('App\Models\UserProfile');
    }

    public function user()
    {
       return $this->belongsTo('App\Models\User');
    }
}
