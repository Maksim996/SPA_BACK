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
     *
     * @response {
     *   "token": "token"
     * }
     * @response status=401 scenario=unauthenticated {
     *   "message": "These credentials do not match our records.",
     *   "errors": {
     *     "email": ["The email is incorrect."],
     *     "password": ["The password is incorrect."]
     *   }
     * }
     * @param LoginPersonnelRequest $request
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
            $role = $userRole->role;
            $scope = [];

            switch ($role) {
                case 'root':
                    // $scope[] = $this->scope;
                    array_push($scope, 'change-password', $this->scope);
                    break;
                case 'director':
                    array_push($scope, 'change-password', $this->scope);
                    break;
                default:
                    $this->scope;
            }
            $token = $user->createToken($user->email . '_' . now(), $scope);

            return response()->json([
                'token' => $token->accessToken,
            ]);
        } else {
            return response()->json([
                'message' => trans('auth.failed'),
                'errors' => [
                    'email' => [trans('auth.email')],
                    'password' => [trans('auth.password')],
                ],
            ], 401);
        }
    }

    /**
     * Logout user (Revoke the token)
     *
     * @response {
     * "message": "Successfully logged out"
     * }
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => __('Successfully logged out')
        ]);
    }
}
