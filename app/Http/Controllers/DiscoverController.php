<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DiscoverController extends Controller
{
    public function view(){
        $queryParams = [];
        if(Request('include_adult') !== null) {
            if(Request('include_adult') === 'on') $queryParams['include_adult'] = 'true';
        }
        if(Request('sort_by') !== null) {
            $queryParams['sort_by'] = Request('sort_by') . "." . Request('order_by');
        }

        return Inertia::render('Discover', ['movies' => TmdbController::getDiscoverMovies($queryParams)]);
    }
}
