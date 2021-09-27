<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CodeController extends Controller
{
    public function index(){
        return view('index');
    }

    public function api_generate(Request $request){
        $request->validate(['link' => ['required', 'string']]);
        return \QrCode::generate($request->link);
    }
}
