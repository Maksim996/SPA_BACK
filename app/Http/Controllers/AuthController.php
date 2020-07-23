<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
/**
 * @group Authentication
 *
 * APIs for authenticate users
 */
class AuthController extends Controller
{
    /**
     * Login user
     * @group Authentication
     *
     * @bodyParam email email required
     * @bodyParam password string required
     *
     * @param Request $request
     * @return [string] token
     */
    public function login(Request $request) {

        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials) ) {
            $user = Auth::user();

            // add role as scope
            $userRole = $user->role()->first();

            if ($userRole) {
                $this->scope = $userRole->role;
            }

            $token = $user->createToken($user->email . '_' . now(), [
                $this->scope
            ]);

            return response()->json([
                'token' => $token->accessToken,
            ]);
        }
    }

    /**
     * Logout user (Revoke the token)
     * @group Authentication
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
