<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends BaseController
{
    //login
    public function login(Request $request){

        if(Auth::attempt([
                'email'=> $request-> email,
                'password'=>$request->password
                ]))
        {
            $user = Auth::user();
            $result['token']= $user->createToken('MdpApp')->plainTextToken;
            $result['name'] = $user->name;

            return $this->sendSuccess($result,'Login Berhasil');
        }else{
            return $this->sendError('Login Gagal');
        }
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


            $token = $user->createToken('kelompok friends')->plainTextToken;
            return response()->json([
                'status' => true,
                'message' => 'Success',
                'token' => $token
            ], 200);
    }

    //logout
    public function logout()
    {
        Auth::user()->tokens()->delete();
        return response()->json([
            'status' => true,
            'message' => 'Sukses berhasil logout',
        ],);
    }
}
