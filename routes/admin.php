<?php

Route::get('/dashboard', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.dashboard');
})->name('dashboard');
//Altas de administrador

Route::get('/altaAdmin', 'adminController@create')->name('register');
Route::post('/altaAdmin', 'adminController@store');

Route::get('/altaUsuario', 'usuarioController@create')->name('register');
Route::post('/altaUsuario', 'usuarioController@store');

Route::get('/altaSucursal', 'sucursalController@create')->name('register');
Route::post('/altaSucursal', 'sucursalController@store');

Route::get('/altaCargo', 'cargoController@create')->name('register');
Route::post('/altaCargo', 'cargoController@store');

Route::get('/altaDepartamento', 'departamentoController@create')->name('register');
Route::post('/altaDepartamento', 'departamentoController@store');

Route::get('/altaTicket', 'ticketsController@create')->name('register');
Route::post('/altaTicket', 'ticketsController@store');


Route::get('/perfil','perfilController@perfilAdministrador');
Route::get('/administradores','perfilController@mostrarAdministradores');
Route::get('/usuarios','perfilController@mostrarUsuarios');
Route::get('/tickets','perfilController@mostrarTickets');
Route::get('/sucursales','perfilController@mostrarSucursales');

