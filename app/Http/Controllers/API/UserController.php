<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\{User, Role, Info};
use Illuminate\Http\Request;
use App\Http\Requests\{ UpdateDirector, UpdatePassword };
use Illuminate\Support\Facades\{Validator, Auth, Hash, Mail};
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Mail\Password;
use App\Http\Resources\{ UserResource, UsersResource };
use Illuminate\Support\{Str, Arr};

/**
 * @group User management
 * @authenticated
 * APIs for managing users
 */
class UserController extends Controller
{
    /**
     * Display a listing of the user with role Director.
     * @group User management
     *
     * @apiResourceCollection App\Http\Resources\UsersResource
     * @apiResourceModel App\User
     * @return \Illuminate\Http\Response
     */
    public function indexDirector()
    {
        return UsersResource::collection(User::isDirector()->get());
    }

    /**
     * Create User with role Director
     * @group User management
     *
     * @response { "message": "User added successfully." }
     *
     * @param \Illuminate\Http\Request   $request
     * @return \Illuminate\Http\Response
     */
    public function createDirector(UpdateDirector $request)
    {
        // ! Why validation doesn't work. Redirect after fails
        // Need sent header Accept: application/json
        $validated = $request->validated();
        $userRole = Role::find(User::DIRECTOR);

        $randomString = Str::random(8); // bytes not char

        $user = $userRole->user()->create([
            'email' => $validated['email'],
            'password' => Hash::make($randomString),
            'created_at' => now(),
        ]);

        $user->save();

        $dataInfo = Arr::except($validated, ['email']);
        $info = Info::create($dataInfo);

        $user->info()->save($info);

        Mail::to($user)->send(new Password($user, $randomString));

        return response()->json(['message' => __('User added successfully')]);
    }

    /**
     * Get user data
     * @group User management
     * @urlParam id required The ID of the user.
     * @apiResource App\Http\Resources\UserResource
     * @apiResourceModel App\User
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function getDirector($id)
    {
        try {
            return new UserResource(User::findOrFail($id));
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => __('User Not found')], 404);
        }
    }

    /**
     * Update user with role director
     * @group User management
     * @urlParam id required The ID of the User
     * @response { "message": "User updated successfully" }
     * @response status=404 scenario="user not found" {
     *   "message": "User not found."
     * }
     * @param App\Http\Requests\UpdateDirector $request
     * @param  \App\User  $id
     * @return \Illuminate\Http\Response
     */
    public function updateDirector(UpdateDirector $request, $id)
    {
        try {
            $model = User::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => __('User Not found')], 404);
        }

        $validated = $request->validated();

        $info = Arr::except($validated, ['email']);
        $model->info()->update($info);
        $model->save();

        $model->update(['email' => $validated['email']]);
        $model->save();

        return response()->json(['message' => __('User updated successfully')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display profile the authenticated user.
     * @group User management
     * @apiResource App\Http\Resources\UserResource
     * @apiResourceModel App\User
     *
     * @return \Illuminate\Http\Response
     */
    public function getUser()
    {
        return new UserResource(Auth::user());
    }

    /**
     * Update status user active isn`t active
     * @group User management
     * @urlParam id required The ID of the User
     *
     * @response { "message": "Status updated" }
     * @response status=404 scenario="user not found" {
     *   "message": "User not found."
     * }
     * @param \App\User $id
     * @return \Illuminate\Http\Resources
     */
    public function active(int $id)
    {
        if (Auth::id() === $id) {
            abort(403, __('Forbidden'));
        }
        try {
            $user = User::findOrFail($id);
        } catch(ModelNotFoundException $e) {
            return response()->json(['message' => __('User Not found')], 404);
        }
        $user->active = $user::switchStatus($user->active);
        $user->save();
        return response()->json(['message' => __('Status updated')]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    /**
     * Update the password for the user.
     *
     * @response {
     *   "message": "Password updated."
     * }
     * @response status=422 scenario="Password Not match" {
     *   "message": "Password Not match"
     * }
     * @param UpdatePassword $request
     * @return Illuminate\Http\Response
     */
    public function changePassword(UpdatePassword $request)
    {
        $validated = $request->validated();

        $old_password = $request->old_password;

        // ! Валідацію перенести в UpdatePassword
        // todo  "message": "The given data was invalid.",
        if (Hash::check($old_password, $request->user()->password)) {
            $request->user()->fill([
                'password' => Hash::make($request->password)
            ])->save();
            return response()->json(['message' => __('Password updated')]);
        }
        return response()->json(['message' => __('Password Not match')], 422);
    }

    /**
     * Send generated password to email
     *
     * @response {
     *  "message": "Message sent"
     * }
     * @response status=404 scenario="user not found" {
     *  "message": "user not found"
     * }
     * @param Request $request
     * @param int $id
     * @return Illuminate\Http\Response
     */
    public function sendEmail(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
        } catch(ModelNotFoundException $e) {
            abort(404, __('User Not found'));
        }

        $randomString = Str::random(8);
        $user->password = Hash::make($randomString);
        $user->save();
        Mail::to($user)->send(new Password($user, $randomString));

        return response()->json([
            'message' => trans('Message sent')
        ], 200);
    }
}
