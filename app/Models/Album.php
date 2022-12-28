<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    public static function getAlbum($userId, $state = 0){

        return Album::select('name', 'id as AlbumID')
                    ->leftJoin('user_albums','albums.id','=','user_albums.album_id')
                    ->where('user_albums.user_id','=',$userId)
                    ->where('albums.isPrivate','=',$state)
                    ->get();
    }

    public static function getAllAlbum($userId){

        return Album::select('name', 'id as AlbumID')
            ->leftJoin('user_albums','albums.id','=','user_albums.album_id')
            ->where('user_albums.user_id','=',$userId)
            ->get();
    }

    public static function getLikedAlbum($userId){

        return Album::select('name', 'id as AlbumID')
            ->leftJoin('album_likes','albums.id','=','album_likes.album_id')
            ->where('album_likes.user_id','=',$userId)
            ->get();
    }

    protected $fillable = ['name', 'isPrivate'];
}
