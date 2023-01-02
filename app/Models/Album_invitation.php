<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album_invitation extends Model
{
    use HasFactory;

    public static function getAllInvitations($userID){
        return self::where('guest_id','=', $userID)->get();
    }
}
