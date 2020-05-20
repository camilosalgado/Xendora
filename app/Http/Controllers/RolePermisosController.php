<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RolePermisosController extends Controller
{
    //
    public function asignarPermisos(Request $request)
    {

        $rol = Role::findOrFail($request->idrol);

        $rol->syncPermissions($request->permisos);
    }

}
