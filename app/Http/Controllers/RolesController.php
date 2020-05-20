<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    //
    public function index()
    {
        return view('layouts.moduls.roles');
    }

    public function getRoles()
    {
        return response()->json(Role::all());
    }

    public function saveRol(Request $request)
    {
        $rol = Role::create([
            'name' => $request->name,
            'display_name' => strtoupper($request->display_name),
            'description' => strtoupper($request->description),
            'created_at' => date('Y-d-m H:i:s'),
            'updated_at' => date('Y-d-m H:i:s'),
        ]);

        return response()->json('Rol Guardado', 200);
    }

}
