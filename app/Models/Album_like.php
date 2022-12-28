<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album_like extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['album_id', 'user_id'];
}
