<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;

class LoginController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $user = User::where('email', $request->email)->firstOrFail();

        if(Hash::check($request->password, $user->password)){
            return UserResource::make($user);
        }else{
            return response()->json(["message" => 'Las credenciales no fueron encontradas'],404);
        }

    }
}
