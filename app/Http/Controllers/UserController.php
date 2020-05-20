<?php

namespace App\Http\Controllers;

use App\TipoDocs;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('layouts.moduls.users');
    }

    public function getTipoDocs()
    {
        return response()->json(TipoDocs::all());
    }

    public function getUsers()
    {
        return response()->json(User::all());
    }

    public function saveUser(Request $request)
    {
        $userdocumento = User::where('documento', $request->documento)->first();
        $usermail = User::where('email', $request->email)->first();
        $tipodoc = TipoDocs::findOrFail($request->tipodocs);
        $ufletter = substr($request->nombre, 0, 1) ;
        $username = strtoupper($ufletter.$request->apellido);

        if ($userdocumento) {
            return response()->json(['warning' => 'Ya Existe un Usuario con el Número de Documento Ingresado...']);
        } elseif ($usermail) {
            return response()->json(['warning' => 'Ya Existe un Usuario con el Email Ingresado...']);
        } else {
            $user = User::create([
                'nombre' => strtoupper($request->nombre),
                'apellido' => strtoupper($request->apellido),
                'usuario' => $username,
                'id_tipodocs' => $tipodoc->id,
                'documento' => $request->documento,
                'email' => $request->email,
                'password' => Hash::make($request->pcontrasenia),
                'secondpassword' => Hash::make($request->scontrasenia),
                'estado' => 1,
                'created_at' => date('Y-d-m H:i:s'),
                'updated_at' => date('Y-d-m H:i:s'),
            ]);

            return response()->json(['success' => 'Usuario Registrado Correctamente']);
        }
    }

}
