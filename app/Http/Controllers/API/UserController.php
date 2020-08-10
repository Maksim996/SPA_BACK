<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\{User, Role, Info};
use Illuminate\Http\Request;
use App\Http\Requests\UpdateDirector;
use Illuminate\Support\Facades\{Validator, Auth};
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Carbon\Carbon;
use App\Http\Resources\{UserResource, UsersResource};

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
     * @response {
     *   "message": "User added successfully."
     * }
     *
     * @param \Illuminate\Http\Request   $request
     * @return \Illuminate\Http\Response
     */
    public function createDirector(UpdateDirector $request)
    {
        $validated = $request->validated();
        // ! Why it doesn't work. Redirect after fails
        // Need sent header Accept: application/json

        $userRole = Role::find(User::DIRECTOR);

        // ! Send password on email (now static password)
        $user = $userRole->user()->create([
            'email' => $request->email,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'created_at' => now(),
        ]);

        $user->save();

        $info = Info::create([
            'first_name' => $request->first_name,
            'second_name' => $request->second_name,
            'patronymic' => $request->patronymic,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
            'additional_phone' => $request->additional_phone,
            'type_passport' => $request->type_passport,
            'passport' => $request->passport,
            'inn_code' => $request->inn_code,
            'sex' => $request->sex,
        ]);
        $user->info()->save($info);

        return response()->json(['message' => 'User added successfully.']);
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
            return response()->json(['message' => 'User not found.'], 404);
        }
    }

    /**
     * Update user with role director
     * @group User management
     * @urlParam id required The ID of the User
     * @response { "message": "User updated successfully" }
     * @response status=404 scenario="user not found" {
     *   "message" => "User not found."
     * }
     * @param App\Http\Requests\UpdateDirector $request
     * @param  \App\User  $id
     * @return \Illuminate\Http\Response
     */
    public function updateDirector(UpdateDirector $request, $id)
    {
        $validated = $request->validated();
        try {
            $model = User::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'User not found.'], 403);
        }

        //$birthday = Carbon::CreateFromFormat('d.m.Y', $request->birthday)->format('Y-m-d');

        $model->info()->update([
            'first_name' => $request->first_name,
            'second_name' => $request->second_name,
            'patronymic' => $request->patronymic,
            'birthday' => $request->birthday,
            'sex' => $request->sex,
            'phone' => $request->phone,
            'additional_phone' => $request->additional_phone,
            'type_passport' => $request->type_passport,
            'passport' => $request->passport,
            'inn_code' => $request->inn_code,
            // 'image' => $request->image ? $request->image : $model->info->image, // ?
        ]);
        $model->save();

        $model->update([
            'email' => $request->email,
        ]);

        $model->save();

        return response()->json(['message' => 'User updated successfully.']);
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
     * @response {
     *   "message": "Status updated."
     * }
     * @response status=404 scenario="user not found" {
     *   "message" => "User not found."
     * }
     * @param \App\User $id
     * @return \Illuminate\Http\Resources
     */
    public function active(int $id)
    {
        if (Auth::id() === $id) {
            abort(403, 'Forbidden');
        }
        try {
            $user = User::findOrFail($id);
        } catch(ModelNotFoundException $e) {
            return response()->json(['message' => 'User not found.'], 404);
        }
        $user->active = $user::switchStatus($user->active);
        $user->save();
        return response()->json(['message' => 'Status updated.']);

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
}
