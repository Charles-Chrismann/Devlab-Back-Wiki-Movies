<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public static function getUserPublicInfosByUsername($username){
        return  User::select('id','username','pp_url')->where('username', $username)->first();
    }

    protected $fillable = ['username', 'email', 'password', 'pp_url'];

//    protected $primaryKey = 'username';
//    public $incrementing = false;
//    protected $keyType = 'string';
}
