<?php

// Route::verb('uri', 'Controller@method')->name('route_name');
// Route:get('usuarios', 'Form\\TestController@listAllUsers')->name('users.listAll');

Route::get('/', function () {
    return view('welcome');
});
