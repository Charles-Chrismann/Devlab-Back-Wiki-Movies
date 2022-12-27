<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_album extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['user_id','album_id'];
}
