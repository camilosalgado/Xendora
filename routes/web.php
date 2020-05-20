<?php


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
 * RUTAS PARA EL MODULO ROLES
 * */
Route::get('/gettipodocs', 'UserController@getTipoDocs');



/*
 * RUTAS PARA EL MODULO ROLES
 * */
Route::get('/users', 'UserController@index')->name('user.index');
Route::get('/getusers', 'UserController@getUsers');
Route::post('/saveuser', 'UserController@saveUser');



/*
 * RUTAS PARA EL MODULO ROLES
 * */
Route::get('/roles', 'RolesController@index')->name('roles.index');
Route::get('/getroles', 'RolesController@getRoles');
Route::post('/saverol', 'RolesController@saveRol');


/*
 * RUTAS PARA EL MODULO PERMISOS
 * */

Route::get('/permisos', 'PermisosController@index')->name('permisos.index');
Route::get('/getpermisos', 'PermisosController@getPermisos');
Route::post('/savepermiso', 'PermisosController@savePermiso');


/*
 * RUTAS PARA FUNCIONALIDAD ASIGNAR PERMISOS AL ROL
 * */
Route::post('/asignarpermisosarol', 'RolePermisosController@asignarPermisos');


/*
 * RUTAS PARA FUNCIONALIDAD ASIGNAR ROL A USUARIOS
 * */
Route::post('/asignarrolauser', 'RoleUserController@asignarRolToUser');


/*
 * RUTAS PARA CARTERA
 * */
Route::get('/wallet', 'CarteraController@index')->name('cartera.index');
 /*Los Nombre de los proveedores son llevados por HOSVITALAPI*/


/*
 * RUTAS PARA REPORTES
 * */
Route::get('/report1', 'ReporteController@reportOne')->name('reportes.nomina1');
Route::get('/report2', 'ReporteController@reportTwo')->name('reportes.nomina2');
Route::get('/report3', 'ReporteController@reportThree')->name('reportes.rrhh1');
Route::get('/report4', 'ReporteController@reportFourth')->name('reportes.rrhh2');

Route::get('/report1getdata/{fecini}/fin/{fecfin}', 'ReporteController@reportOneGetData');
Route::get('/report2getdata/{fec}', 'ReporteController@reportTwoGetData');
Route::get('/report3getdata/{mes}', 'ReporteController@reportThreeGetData');
Route::get('/report4getdata/{fecini}/fin/{fecfin}', 'ReporteController@reportFourthGetData');
