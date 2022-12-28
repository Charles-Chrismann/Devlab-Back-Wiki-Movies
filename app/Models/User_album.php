<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_album extends Model
{
    use HasFactory;

    public static function linkAlbum( $userID, $albumID){
        return User_album::create([
            'user_id' => $userID,
            'album_id' => $albumID
        ]);
    }

    public $timestamps = false;
    protected $fillable = ['user_id','album_id'];
}
