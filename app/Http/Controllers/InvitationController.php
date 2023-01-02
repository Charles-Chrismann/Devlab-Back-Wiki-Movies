<?php

namespace App\Http\Controllers;

use App\Models\Album_invitation;
use App\Models\User;
use App\Models\Album;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InvitationController extends Controller
{
    public function invPage(){
        $invitations= Album_invitation::getAllInvitations(session('userID'));
        $owners=[];
        $albums=[];
        foreach ($invitations as $inv){
            array_push($owners, ['name'=>User::select('username')->where('id','=', $inv['owner_id'])->get()->first(), 'id'=> $inv['owner_id']]);
            array_push($albums, ['name'=>Album::select('name')->where('id','=',$inv['album_id'])->get()->first(), 'id'=>$inv['album_id']]);
        }
        return Inertia::render('Invitations', ['invitations'=>$invitations, 'owners'=> $owners, 'albums'=>$albums]);
    }

    public function acceptInv(){

    }

    public function declineInv(){

    }
}
