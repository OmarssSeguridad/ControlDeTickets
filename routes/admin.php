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

//Bajas
Route::delete('/bajaAdmin/{id}','adminController@destroy');
Route::delete('/bajaUsuario/{id}','usuarioController@destroy');
Route::delete('/bajaTicket/{id}','ticketsController@destroy');
Route::delete('/bajaSucursal/{id}','sucursalController@destroy');

//ComboBoxes
Route::get('/altaAdmin', 'perfilController@combo');
Route::get('/altaUsuario', 'perfilController@combo');
Route::get('/editaAdmin/{id}','perfilController@combo');

//Modificaciones
Route::get('/editaAdmin/{id}','adminController@edit')->name('editar');
Route::put('/editarAdmin/{id}','adminController@update');




//Dashboard
Route::get('/dashboard', 'perfilController@contenidoDashboard');






Route::get('/perfil','perfilController@perfilAdministrador');
Route::get('/administradores','perfilController@mostrarAdministradores');
Route::get('/usuarios','perfilController@mostrarUsuarios');
Route::get('/tickets','perfilController@mostrarTickets');
Route::get('/sucursales','perfilController@mostrarSucursales');

