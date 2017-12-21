<?php

// Route::get('', ['as' => 'admin.dashboard', function () {
// 	$content = 'Define your dashboard here.';
// 	return AdminSection::view($content, 'Dashboard');
// }]);

// Route::get('information', ['as' => 'admin.information', function () {
// 	$content = 'Define your information here.';
// 	return AdminSection::view($content, 'Information');
// }]);



// Route::get('/all_admins', ['as' => 'admin.all_admins', function () {
//     $content = 'Все администраторы' ;
//     return AdminSection::view($content);
// }]);


    // Route::get('/all_admins', [
    //     'as' => 'admin.all_admins',
    //     'uses' => '\App\Http\Controllers\AdminControllers\AdminController@all_admins',
    // ]);




// Route::get('/new_admin', ['as' => 'admin.new_admin', function () {
//     $content = 'Создать нового администратора';
//     return AdminSection::view('',$content);
// }]);

// Route::get('/all_catrgories', ['as' => 'admin.all_catrgories', function () {
//    $content = 'Все темы';
//     return AdminSection::view('',$content);
// }]);

// Route::get('/new_category', ['as' => 'admin.new_category', function () {
//    $content = 'Создать новую тему';
//     return AdminSection::view('',$content);
// }]);



Route::get('/all_catrgories', [
        'as' => 'admin.all_catrgories',
        'uses' => '\App\Http\Controllers\AdminControllers\AdminController@all_catrgories',
    ]);
