<?php

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('roles', 'Rol\RolController');

Route::apiResource('clientes', 'Cliente\ClienteController');

Route::apiResource('proveedores', 'Proveedor\ProveedorController');

Route::apiResource('modalidades', 'Modalidad\ModalidadController');

/******************************************************************************************************/ 
Route::resource('listaPreciosModalidades', 'ListaPrecioModalidad\ListaPrecioModalidadController')->except(['show', 'update', 'destroy', 'create', 'edit']);

Route::get('listaPreciosModalidades/{modalidad_id}/{tiempo_id}', 'ListaPrecioModalidad\ListaPrecioModalidadController@show')->name('listaPreciosModalidades.show');

Route::put('listaPreciosModalidades/{modalidad_id}/{tiempo_id}', 'ListaPrecioModalidad\ListaPrecioModalidadController@update')->name('listaPreciosModalidades.update');

Route::delete('listaPreciosModalidades/{modalidad_id}/{tiempo_id}', 'ListaPrecioModalidad\ListaPrecioModalidadController@destroy')->name('listaPreciosModalidades.destroy');
/******************************************************************************************************/ 

Route::apiResource('paises', 'Pais\PaisController')->parameters(['paises' => 'pais']);

Route::apiResource('regiones', 'Region\RegionController')->parameters(['regiones' => 'region']);

/******************************************************************************************************/ 
Route::resource('distritos', 'Distrito\DistritoController')->except(['show', 'update', 'destroy', 'create', 'edit']);

Route::get('distritos/{id}/{region_id}', 'Distrito\DistritoController@show')->name('distritos.show');

Route::put('distritos/{id}/{region_id}', 'Distrito\DistritoController@update')->name('distritos.update');

Route::delete('distritos/{id}/{region_id}', 'Distrito\DistritoController@destroy')->name('distritos.destroy');
/******************************************************************************************************/ 

Route::apiResource('barrios', 'Barrio\BarrioController');

Route::apiResource('ventas', 'Venta\VentaController');




//Route::resource('distritos', 'Distrito\DistritoController')->parameters(['distritos' => 'id','region_id']);


// Route::get('distritos/{id}/{region_id}', function ($id, $name) {

//     return DB::table('distritos')
//                      ->select('distrito')
//                      ->where('id', '=', $id)
//                      ->where('region_id', '=', $name)
//                      ->get();

//     return DB::table('users')
//                      ->select(DB::raw('count(*) as user_count, status'))
//                      ->where('status', '<>', 1)
//                      ->groupBy('status')
//                      ->get();
//     return DB::table('paises')->select('nombre')->get();
//     return DB::table('paises')->where('id', $id)->exists();    
// });->where(['id' => '[0-9]+', 'name' => '[a-z]+']);
