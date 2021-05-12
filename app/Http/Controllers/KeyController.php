<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\ActivationKey;

class KeyController extends Controller
{
    
    public function Activate(Request $request){

        $key = $request->input('key');
        $email = $request->input('email');

        $user_id = User::where('email', '=', $email)->first();

        if($user_id == null){
            return $this->formatResponse('user_not_found');
        }

        $activationKey = ActivationKey::where([
            ['user_id', '=', $user_id->id],
            ['key', '=', $key]
            ])->first();

        if($activationKey == null){
            return $this->formatResponse('invalid_key');
        } else if($activationKey->activation_date != null){
            return $this->formatResponse('used_key');
        }

        $activationKey->activation_date = date('Y-m-d H:i:s');;
        $activationKey->save();

        return $this->formatResponse('successfull_validation');
    }

    public function Check(Request $request){

        $key = $request->input('key');
        $activationKey = ActivationKey::where([
            ['key', '=', $key]
        ])->first();

        if($activationKey == null){
            return $this->formatResponse('invalid_key');
        } elseif($activationKey->activation_date == null){
            return $this->formatResponse('inactive_key');
        }
        return $this->formatResponse('active_key');
    }


    private function formatResponse($key){
        return new Response(json_encode(['code' => config("constants.codes.$key.code"),'message' => config("constants.codes.$key.message")])); 
    } 

}
