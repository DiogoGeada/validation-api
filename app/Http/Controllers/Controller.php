<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActivationController extends Controller
{
    
    public function activate(Request $request){

        $email = $request->input('key');
        $key = $request->input('key');

    }

}
