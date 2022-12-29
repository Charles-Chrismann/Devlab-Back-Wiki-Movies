<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album_film extends Model
{
    use HasFactory;


    public static function AlreadyExist($filmID, $albumID){
        if(self::where('album_id',"=",$albumID)->where('movie_id','=', $filmID)->count() != 0){
            return true;
        }
        return false;
    }

    public static function addMovie($filmID, $albumID){
        return self::create(['album_id'=>$albumID,'movie_id'=>$filmID]);
    }

    public static function getAllMoviesFromAlbum($albumID){
        return self::select('movie_id')->where('album_id','=', $albumID)->get();
    }

    public $timestamps = false;
    protected $fillable = ['album_id', 'movie_id'];
}
