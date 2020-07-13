<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Info;
use Illuminate\Http\Request;
// use App\Http\Requests\UserStore;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with(['info', 'role'])->get();
        return $users;
    }
    /**
     * Create User with role Director
     *
     * @param UserStore   $request
     * @return \Illuminate\Http\Response
     */
    public function createDirector(Request $request)
    {
        // $validated = $request->validated();

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
