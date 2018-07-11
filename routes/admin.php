<?php

Route::get('/dashboard', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.dashboard');
})->name('home');
//Altas de administrador
//Route::get('/altaAdmin','adminController@create');  
//Route::post('/altaAdmin', 'AdminAuth\RegisterController@create');

Route::get('/altaAdmin', 'adminController@create')->name('register');
Route::post('/altaAdmin', 'AdminAuth\RegisterController@register');

Route::get('/perfil','perfilController@perfilAdministrador');
Route::get('/administradores','perfilController@mostrarAdministradores');
Route::get('/usuarios','perfilController@mostrarUsuarios');
Route::get('/tickets','perfilController@mostrarTickets');