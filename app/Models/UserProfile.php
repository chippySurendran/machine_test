<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname',
        'lname',
        'user_id',
    ];

    public function note()
    {
        return $this->hasMany('App\Models\Note');
    }

    public function user()
    {
       return $this->belongsTo('App\Models\User');
    }
}
