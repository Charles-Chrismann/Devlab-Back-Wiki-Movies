<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    protected function insert() {
        request()->validate([
            'name' => 'required',
            'image_url' => 'required',
            'description' => 'required',
            'program' => 'required',
            'year' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
        ]);

        $data = request()->all();

        $cour = new \App\Models\Cour();

        $cour->name = $data['name'];
        $cour->image_url = $data['image_url'];
        $cour->description = $data['description'];
        $cour->program = $data['program'];
        $cour->year = $data['year'];
        $cour->date_start = $data['date_start'];
        $cour->date_end = $data['date_end'];

        $cour->save();

        return response('OK',200);
    }

    protected function updateById($id){

        $cour = \App\Models\Cour::find($id);

        if(!$cour){
            return response('not found',404);
        }

        request()->validate([
            "name"=> 'required',
            "image_url"=> 'required',
            "description"=> 'required',
            "program"=> 'required',
            "year"=> 'required',
            "date_start"=> 'required',
            "date_end"=> 'required'
        ]);

        $cour->update(request()->only('name','image_url','description','program','year','date_start','date_end'));

        return response('OK',200);

    }

    protected function deleteById($id){
        $cour = \App\Models\Cour::find($id);

        if(!$cour){
            return response('not found',404);
        }

        $cour->delete();

        return response('OK',200);
    }
}
