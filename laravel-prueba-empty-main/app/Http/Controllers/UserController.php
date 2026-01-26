<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\User_Preferences;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:6',
            'confirm_password' => 'required|same:password',
            'biography' => 'required|string|max:255',
            'website' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en la validacion', 'errors' => $validator->errors()]);
        }

        $data = $validator->validated();
        $data['password'] = Hash::make($data['password']);
        unset($data['confirm_password']);

        $user = User::create($data);

        return response()->json([
            'message' => 'Usuario creado con éxito',
            'user' => $user
        ], 201);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json('Usuario no enctrado', 404);
        }

        $user->delete();

        return response()->json('Usuario eliminado exitosamenete', 200);
    }

    public function update(Request $req, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json('Usuario no encontrado', 400);
        }

        $validator = Validator::make($req->all(), [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'biography' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error en la validacion',
                'errors' => $validator->errors()
            ], 400);
        }

        $data = $validator->validated();

        $user->update($data);

        return response()->json(['message' => 'Usuario actualizado correctamente', 'user' => $user], 200);

    }

    public function login(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en la validacion', 'errors' => $validator->errors()], 400);
        }

        $data = $validator->validated();

        if (!Auth::attempt($data)) {
            return response()->json('Credenciales invalidas', 401);
        }

        return response()->json('Sesion iniciada con exito', 200);
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json('Usuario no encontrado', 404);
        }

        return response()->json($user, 200);
    }

    public function getPreferences($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json('Usuario no encontrado', 404);
        }

        // Carga la relación hasOne
        $preferences = User_Preferences::where('user_id', $id)->get();

        if (!$preferences) {
            return response()->json('El usuario no tiene preferencias', 404);
        }

        return response()->json([
            'user_id' => $user->id,
            'preferences' => $preferences
        ], 200);
    }

    public function getTasks($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json('Usuario no encontrado', 404);
        }

        // Carga la relación hasOne
        $tasks = Task::where('user_id', $id)->get();

        if (count($tasks)< 1) {
            return response()->json('El usuario no tiene tasks', 404);
        }

        return response()->json([
            'user_id' => $user->id,
            'tasks' => $tasks
        ], 200);
    }
}
