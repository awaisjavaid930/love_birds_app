<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\LoveBirdParent;
use App\Models\User;
use Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();

        return view('users.index', compact('users'));

    }

    public function userPairs(User $user)
    {
        $pairs = LoveBirdParent::whereUserId($user->id)->get();

        return view('users.pairs', compact('pairs'));
    }

    public function login(LoginRequest $request)
    {
        $validated = $request->validated();
        if (Auth::attempt($validated)) {
            $user = Auth::user();
            $user['token'] = $request->user()->createToken('authToken')->plainTextToken;

            return response()->json(['status' => Response::HTTP_CREATED, 'data' => UserResource::make($user)]);
        }

        return response()->json(['status' => 404, 'message' => 'user not found']);
    }

    public function create()
    {
        return view('users.create');
    }

    public function register(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        if ($request->wantsJson()) {
            return response()->json(['status' => Response::HTTP_OK, 'data' => ChickResource::make($chick)]);
        } else {
            return redirect()->route('users.index');
        }
    }
}
