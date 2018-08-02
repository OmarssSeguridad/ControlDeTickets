<?php

Route::get('/dashboard', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.dashboard');
})->name('dashboard');
//Altas de administrador

Route::get('/altaAdmin', 'adminController@create')->name('altaAdmin');
Route::post('/altaAdmin', 'adminController@store');

Route::get('/altaUsuario', 'usuarioController@create')->name('altaUsuario');
Route::post('/altaUsuario', 'usuarioController@store');

Route::get('/altaSucursal', 'sucursalController@create')->name('altaSucursal');
Route::post('/altaSucursal', 'sucursalController@store');

Route::get('/altaCargo', 'cargoController@create')->name('altaCargo');
Route::post('/altaCargo', 'cargoController@store');

Route::get('/altaDepartamento', 'departamentoController@create')->name('altaDepartamento');
Route::post('/altaDepartamento', 'departamentoController@store');

Route::get('/altaTicket', 'ticketsController@create')->name('altaTicket');
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
Route::get('/editaAdmin/{id}','adminController@edit')->name('editarAdmin');
Route::put('/editarAdmin/{id}','adminController@update');

Route::get('/editaUsuario/{id}','usuarioController@edit')->name('editarUsuario');
Route::put('/editarUsuario/{id}','usuarioController@update');

Route::get('/editaSucursal/{id}','sucursalController@edit')->name('editarUsuario');
Route::put('/editarSucursal/{id}','sucursalController@update');

//Route::get('/editaTicket/{id}','ticketsController@edit')->name('editarTicket');
//Route::put('/editarTicket/{id}','ticketsController@update');


//Dashboard
Route::get('/dashboard', 'perfilController@contenidoDashboard');

//Respuestas
//Route::get('/enviarRespuesta', 'respuestasController@create')->name('altaRespuesta');
Route::post('/enviarRespuesta','respuestasController@store');

//Status


Route::get('/perfil','perfilController@perfilAdministrador');
Route::get('/administradores','perfilController@mostrarAdministradores');
Route::get('/usuarios','perfilController@mostrarUsuarios');
Route::get('/tickets','perfilController@mostrarTickets');
Route::get('/sucursales','perfilController@mostrarSucursales');

Route::get('/editaTicket/{id}', 'ticketsController@edit'); 

Route::put('/cambiarStatus/{id}','ticketsController@modificaStatus');


