<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VisitorRepresentative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

class VisitorAuthController extends Controller
{
    // Registro de Usuario Base
    public function registerUser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'fecha_ingreso' => Date::now(),
            'estado' => "active",
            'password' => bcrypt($validatedData['password']),
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'message' => 'Usuario registrado exitosamente.',
            'data' => $token,
        ], 201);
    }

    // Registro de Representante
    public function registerRepresentative(Request $request)
    {
        // Obtener el usuario autenticado desde el token
        $user = auth()->user();
        var_dump($user->id);
    
        if (!$user) {
            return response()->json(['message' => 'Usuario no autenticado.'], 401);
        }
    
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'identification' => 'required|unique:visitor_representatives,identification',
            'phone' => 'required|string',
        ]);
    
        // Crear el representante asociado al usuario autenticado
        $representative = VisitorRepresentative::create([
            'user_id' => $user->id,
            'identification' => $validatedData['identification'],
            'phone' => $validatedData['phone'],
        ]);
    
        // Crear el token desde el usuario autenticado
        $token = $representative->user->createToken('auth_token')->plainTextToken;
    
        return response()->json([
            'message' => 'Representante registrado exitosamente.',
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 201);
    }
    

    // Login del Representante
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required',
        ]);

        // Buscar al usuario por email
        $user = \App\Models\User::where('email', $validatedData['email'])->first();

        // Validar si el usuario existe y si la contraseña es correcta
        if (!$user || !Hash::check($validatedData['password'], $user->password)) {
            return response()->json(['message' => 'Credenciales inválidas'], 401);
        }


        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Inicio de sesión exitoso.',
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
}
