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


Route::get('/altaAdmin', 'usuarioController@create')->name('register');
Route::post('/altaAdmin', 'usuarioController@store');


Route::get('/perfil','perfilController@perfilAdministrador');
Route::get('/administradores','perfilController@mostrarAdministradores');
Route::get('/usuarios','perfilController@mostrarUsuarios');
Route::get('/tickets','perfilController@mostrarTickets');

Route::get('/altaTicket','ticketsController@create');