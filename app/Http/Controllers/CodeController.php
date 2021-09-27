<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CodeController extends Controller
{
    public function generate(Request $request){
        $request->validate(['link' => ['required', 'string']]);
        return view('qrcode')->with('link', $request->link);
    }

    public function api_generate(Request $request){
        $request->validate(['link' => ['required', 'string']]);
        return \QrCode::generate($request->link);
    }
}
