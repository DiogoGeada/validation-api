<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\ActivationKey;

class ActivationController extends Controller
{
    
    public function Activate(Request $request){

        $key = $request->input('key');
        $email = $request->input('email');

        $user_id = User::where('email', '=', $email)->first();

        if($user_id == null){
            return new Response(json_encode(['message' => "User not found"]), 404);
        }

        $activationKey = ActivationKey::where([
            ['user_id', '=', $user_id->id],
            ['key', '=', $key]
            ])->first();

        if($activationKey == null){
            return new Response(json_encode(['message' => "Activation key is not valid"]), 200);
        } else if($activationKey->activation_date != null){
            return new Response(json_encode(['message' => "This key has already been used"]), 200);
        }

        $activationKey->activation_date = date("Y-m-d H:i:s");;
        $activationKey->save();

        return new Response(json_encode(['message' => 'Validation was successfull']), 200);
    }

}
