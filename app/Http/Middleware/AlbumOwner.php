<?php

namespace App\Http\Middleware;

use App\Models\Album;
use App\Models\User_album;
use Closure;
use Illuminate\Http\Request;

class AlbumOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Album::isPrivate($request['albumID'])){
            if(User_album::isOwner(session('userID'), $request['albumID'])){
                return $next($request);
            }
        }else{
            return $next($request);
        }
        abort(403);
    }
}
