<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;

class AuthController extends Controller
{
    public $successStatus = 200;

    public function login(UserRequest $request) {
        $input = $request->validated();
        if(Auth::attempt(['email' => $input['email'], 'password' => $input['password']])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('Login '.$input['email'])->accessToken;
            return response()->json(['success' => $success], $this->successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function register(UserRequest $request) {
        $input = $request->validated();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('Register '.$input['email'])->accessToken;
        $success['email'] =  $user->email;

        return response()->json(['success'=>$success], $this->successStatus);   
    
    }

}
