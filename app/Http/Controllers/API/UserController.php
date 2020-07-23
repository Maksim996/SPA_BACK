<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Info;
use Illuminate\Http\Request;
// use App\Http\Requests\StoreDirector;
use App\Http\Requests\UpdateDirector;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Carbon\Carbon;
use App\Http\Resources\UserResource;
use App\Http\Resources\UsersResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexDirector()
    {
        return UsersResource::collection(User::all());
    }

    /**
     * Create User with role Director
     *
     * @param \Illuminate\Http\Request   $request
     * @return \Illuminate\Http\Response
     */
    public function createDirector(Request $request)
    {
        // $validated = $request->validated(); // Why it doesn't work. Redirect after fails
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'patronymic' => 'required|string|max:255',
            'email' => 'required|unique:users|email|max:255',
            'birthday' => 'required|date',
            'sex' => 'required|boolean',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10', // todo
            'additional_phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10', // tODO +380 need todo
            'passport' => 'required|unique:user_info',
            'inn_code' => 'required|unique:user_info|string|size:10',
            'image' => 'nullable|mimes:jpeg,bmp,png',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

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
            'passport' => $request->passport,
            'inn_code' => $request->inn_code,
            'sex' => $request->sex,
        ]);
        $user->info()->save($info);

        return response()->json(['message' => 'User added successfully!']);
    }

    /**
     * get user data
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
     *
     * @param \App\Http\Requests\UpdateDirector $request
     * @param  \App\User  $id
     * @return \Illuminate\Http\Response
     */
    public function updateDirector(UpdateDirector $request, $id)
    {
        try {
            $model = User::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'User not found.'], 403);
        }

        // !validation
        $validated = $request->validated();
        /*
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'patronymic' => 'required|string|max:255',
            'birthday' => 'required|date',
            'sex' => 'required|boolean',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'additional_phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'passport' => 'required|unique:user_info',
            'inn_code' => 'required|unique:user_info|string|size:10',
            'image' => 'nullable|mimes:jpeg,bmp,png',
        ]);
        */
        $birthday = Carbon::CreateFromFormat('d.m.Y', $request->birthday)->format('Y-m-d');

        $model->info()->update([
            'first_name' => $request->first_name,
            'second_name' => $request->second_name,
            'patronymic' => $request->patronymic,
            'birthday' => $birthday,
            'sex' => $request->sex,
            'phone' => $request->phone,
            'additional_phone' => $request->additional_phone,
            'passport' => $request->passport,
            'inn_code' => $request->inn_code,
            'image' => $request->image ? $request->image : $model->info->image, // ?
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
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
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