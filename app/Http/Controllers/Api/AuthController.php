<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;
        $user = User::where('email',$email)->first();
        if($user){
            if($user->password==$password){
                return json_encode([
                    "data" => $user,
                    "message" => "Login successfull",
                    "error" => false
                ]);
            }
            else {
                return json_encode([
                    "data"=>$user,
                    "message" => "Invalid username/password",
                    "error" => true
                ]);
            }
        }
        return $user;
    }
}
