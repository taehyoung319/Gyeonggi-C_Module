<?php

namespace App\Http\Controllers;

use App\Garden;
use App\User;
use Illuminate\Http\Request;

class GardenController extends Controller
{
    public function gardenPage(Request $request)
    {
        if(!$request->all()) {
            $garden = Garden::orderBy('id', 'desc')->get();
        }else if($request->all() && $request->sort == 'desc') {
            $garden = Garden::orderBy('score', 'asc')->get();
        }else if($request->all() && $request->sort == 'asc') {
            $garden = Garden::orderBy('score', 'desc')->get();
        }

        return view('garden.garden', compact('garden'));
    }

    public function gardenMorePage($id)
    {
        $more = Garden::find($id);

        return view('garden.more', compact('more'));
    }

}
