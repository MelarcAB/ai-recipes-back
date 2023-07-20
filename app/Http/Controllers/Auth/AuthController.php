<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

use App\Http\Requests\Auth\RegisterRequest;

use App\Http\Resources\User\UserResource;
use App\Http\Resources\Auth\UserLoginResource;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }


    public function register(RegisterRequest $request)
    {

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);


            return response()->json([
                'message' => '¡Usuario creado correctamente!',
                'user' =>  new UserResource($user),
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => '¡Error al crear el usuario!',
                'error' => $e->getMessage(),
            ], 409);
        }
    }


    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = Auth::attempt($credentials)) {

            return response()->json([
                'message' => '¡Credenciales incorrectas!',
            ], 401);
        }

        return response()->json([
            'token' => $token,
            'user' => new UserLoginResource(auth()->user()),
        ], 200);
    }
}
