<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album_invitation extends Model
{
    use HasFactory;

    public static function getAllInvitations($userID){
        return self::
            select('album_id as albumID', 'owner_id as ownerID', 'guest_id as guestID', 'username as ownerName', 'name as albumName')
            ->join('users','album_invitations.owner_id','=','users.id')
            ->join('albums','albums.id','=','album_invitations.album_id')
            ->where('guest_id','=',$userID)
            ->get();
    }
}
