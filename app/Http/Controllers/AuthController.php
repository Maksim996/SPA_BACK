<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginPersonnelRequest;
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
     * @response {
     *   "token": "token"
     * }
     * @param Request $request
     * @return [string] token
     */
    public function login(LoginPersonnelRequest $request) {

        $credentials = $request->only('email', 'password');
        $credentials['active'] = 1;
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
     * @response {
     * "message": "Successfully logged out"
     * }
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
