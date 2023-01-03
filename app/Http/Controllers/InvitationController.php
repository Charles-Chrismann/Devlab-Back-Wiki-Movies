<?php

namespace App\Http\Controllers;

use App\Models\Album_invitation;
use App\Models\User;
use App\Models\Album;
use App\Models\User_album;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InvitationController extends Controller
{
    public function invPage(){
        $invitations= Album_invitation::getAllInvitations(session('userID'));
        return Inertia::render('Invitations', ['invitations'=>$invitations]);
    }

    public function sendInvPage(){
        $albums=Album::getNotDefault(session('userID'));
        return Inertia::render('InviteUser', ['albums'=>$albums]);
    }

    public function sendInv(Request $request){
        $request->validate([
            'name'=>'required',
            'album'=>'required'
        ]);

        if(Album::albumExist($request['album'])){

            if(User_album::isOwner(session('userID'), $request['album'])){

                if(User::userExist($request['name'])){

                    if(strtolower(session('username'))!=strtolower($request['name'])){

                        $guest= User::getUserPublicInfosByUsername($request['name']);

                        if(!Album_invitation::alreadySend(session('userID'), $guest['id'] ,$request['album'])){

                            Album_invitation::sendInvite(session('userID'), $guest['id'] ,$request['album']);
                            return redirect()->route('myprofile')->with('message',"Invitation sent successfully");

                        }else{
                            $res = "Invitation already sent";
                        }
                    }else{
                        $res = "You cannot send an invitation to yourself";
                    }
                }else{
                    $res = "Unknow user";
                }
            }else{
                $res = "You do not own this album";
            }
        }else{
            $res = "Unknow album";
        }

        $albums=Album::getNotDefault(session('userID'));
        return Inertia::render('InviteUser', ['albums'=>$albums,'res'=>$res]);
    }

    public function acceptInv($ownerID,$albumID){
        User_album::linkAlbum(session('userID'), $albumID);
        Album_invitation::deleteInv($ownerID,session('userID'), $albumID);
        return back();
    }

    public function declineInv($ownerID, $albumID){
        Album_invitation::deleteInv($ownerID,session('userID'), $albumID);
        return back();
    }
}
