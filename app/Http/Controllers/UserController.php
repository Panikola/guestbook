<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Validator;
use App\Http\Resources\User as UserResource;

class UserController extends Controller
{
    public function login()
    {

        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
//            Auth::login($user, true);
            return new UserResource($user);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'name' => 'required',
          'email' => 'required|email',
          'password' => 'required',
          'c_password' => 'required|same:password',
          'role' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $success = DB::transaction(function () use ($request) {

            $user = User::create($request->except('role'));
            $user->assignRole($request->only('role'));

            $success['name'] = $user->name;
            $success['roles'] = $user->getRoleNames();
            $success['token'] =  $user->createToken('personal', [])->accessToken;

            return $success;
        });

        return response()->json(['success' => $success], 200);
    }

    public function userInfo()
    {
        $user = Auth::user();
        return new UserResource($user);
    }
}