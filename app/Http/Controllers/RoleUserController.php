<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    //

    public function asignarRolToUser(Request $request)
    {
        if (!empty($request->checkedRol)) {
            if (sizeof($request->checkedRol) == 1) {

                $user = User::findOrFail($request->iduser);
                $user->syncRoles($request->checkedRol);

                return response()->json(['success' => 'Rol Asignado Correctamente']);

            } else {
                response()->json(['warning' => 'No Se Permite Asignar Varios Roles a un Usuario']);
            }
        } else {
            return response()->json(['warning' => 'Error, No Olvides Seleccionar Un Rol']);
        }
    }

}
