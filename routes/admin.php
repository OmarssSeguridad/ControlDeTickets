<?php

Route::get('/dashboard', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.dashboard');
})->name('home');

Route::get('/perfil','perfilController@perfilAdministrador');
Route::get('/administradores','perfilController@mostrarAdministradores');
Route::get('/usuarios','perfilController@mostrarUsuarios');
Route::get('/tickets','perfilController@mostrarTickets');