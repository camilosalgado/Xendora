<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;

class PermisosController extends Controller
{
    //
    public function index()
    {
        return view('layouts.moduls.permisos');
    }

    public function getPermisos()
    {
        return response()->json(Permission::all());
    }

    public function savePermiso(Request $request)
    {
        $rol = Permission::create([
            'name' => strtolower($request->name),
            'display_name' => strtoupper($request->display_name),
            'description' => strtoupper($request->description),
            'created_at' => date('Y-d-m H:i:s'),
            'updated_at' => date('Y-d-m H:i:s'),
        ]);

        return response()->json('Rol Guardado', 200);
    }
}
