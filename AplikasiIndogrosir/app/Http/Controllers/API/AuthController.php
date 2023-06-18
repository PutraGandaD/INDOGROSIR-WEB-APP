<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //login
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Gagal Melakukan Login!',
            ], 422);
        }

        $token = $user->createToken('IndogrosirApp')->plainTextToken;
        return response()->json([
            'status' => true,
            'message' => 'Login Success',
            'token' => $token
        ], 200);
    }

    //register
    public function register(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'name' => 'required|string',
            'password' => 'required|string',
        ]);
        $validated['password'] = Hash::make($request->password);
        User::create($validated);
        $user = User::where('email', $request->email)->first();


            $token = $user->createToken('IndogrosirApp')->plainTextToken;
            return response()->json([
                'status' => true,
                'message' => 'Register Success',
                'token' => $token
            ], 200);
    }

    //logout
    public function logout()
    {
        Auth::user()->tokens()->delete();
        return response()->json([
            'status' => true,
            'message' => 'Logout Success',
        ],);
    }
}
