<?php

Route::get('/dashboard', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('usuario')->user();

    //dd($users);

    return view('usuario.dashboard');
})->name('dashboard');

Route::get('/altaTicket', 'ticketsController@createUsuario')->name('altaTicket');
Route::post('/altaTicket', 'ticketsController@storeUsuario');

Route::post('/enviarRespuesta','respuestasController@storeUsuario');


Route::get('/perfil','perfilController@perfilUsuario');
Route::get('/tickets/','perfilController@mostrarTicketsUsuario');

Route::get('/editaTicket/{id}', 'ticketsController@editUsuario'); 
//Route::put('/cambiarStatus/{id}','ticketsController@modificaStatus');


