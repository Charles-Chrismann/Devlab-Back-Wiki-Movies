<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album_like extends Model
{
    use HasFactory;

    public static function alreadyLike($albumID){
        if(self::where('album_id','=',$albumID)->where('user_id','=',session()->get('userID'))->count() === 0){
            return false;
        }
        return true;
    }
    public static function likeAlbum($albumID){
        return self::create([
            'user_id'=>session()->get('userID'),
            'album_id'=>$albumID,
        ]);
    }

    public static function getAllLikes(){
        return self::select('album_id')->where('user_id','=',session('userID'))->get();
    }
    public $timestamps = false;
    protected $fillable = ['album_id', 'user_id'];
}
