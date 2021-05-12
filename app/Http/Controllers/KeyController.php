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
            return response($this->formatResponse('user_not_found'),200, ['Content-type => application/json']);
        }

        $activationKey = ActivationKey::where([
            ['user_id', '=', $user_id->id],
            ['key', '=', $key]
            ])->first();

        if($activationKey == null){
            return response($this->formatResponse('invalid_key'),200, ['Content-type => application/json']);
        } else if($activationKey->activation_date != null){
            return response($this->formatResponse('used_key'), 200, ['Content-type => application/json']);
        }

        $activationKey->activation_date = date('Y-m-d H:i:s');;
        $activationKey->save();

        return response($this->formatResponse('successfull_validation'), 200, ['Content-type => application/json']);
    }

    public function Check(Request $request){

        $key = $request->input('key');
        $activationKey = ActivationKey::where([
            ['key', '=', $key]
        ])->first();

        if($activationKey == null){
            return response($this->formatResponse('invalid_key'),200, ['Content-type => application/json']);
        } elseif($activationKey->activation_date == null){
            return response($this->formatResponse('inactive_key'), 200, ['Content-type => application/json']);
        }
        return response($this->formatResponse('active_key'),200, ['Content-type => application/json']);
    }


    private function formatResponse($key){
        return json_encode(['code' => config("constants.codes.$key.code"),'message' => config("constants.codes.$key.message")]); 
    } 

}
