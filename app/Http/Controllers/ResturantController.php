<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use Illuminate\Http\Request;

class ResturantController extends Controller
{
    public function store(Request $request){
        $postData = $this->validate($request, [
            'name' => 'required|min:3',
            'location' =>'required|min:3',
            'tables' => 'required|integer',

        ]);

        $resto = Auth::user()->resturants()->create($postData);
        return response()->json($resto, 201);
    }
}
