<?php

namespace App\Http\Controllers;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function  index()  {
        return 'sign in';

    }
    public function loginAdmin(Request $request) {
        $credentials = $request->only('email', 'password');
        try {
            if (!$token = auth()->guard('admins')->attempt($credentials)) {
                return response()->json(['success' => false, 'error' => 'Some Error Message'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['success' => false, 'error' => 'Failed to login, please try again.'], 500);
        }
        return $this->respondWithToken($token);
      }

}
