<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
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
