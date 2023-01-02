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
        return Inertia::render('Invitations', ['invitations'=>$invitations]);
    }

    public function acceptInv(){

    }

    public function declineInv(){

    }
}
