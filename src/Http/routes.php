<?php

Route::group(['middleware' => ['web', 'permission:' . Gcms::MAIN_ADMIN_PERMISSION], 'prefix' => getAdminPrefix('content')], function () {
    Route::group(['middleware' => ['permission:modules_content_admin_list']], function () {
        Route::get('{type}', 'GeekCms\Content\Http\Controllers\AdminController@index')
            ->name('content');
    });

    Route::get('{type}/edit/{item}', 'GeekCms\Content\Http\Controllers\AdminController@edit')
        ->name('content.edit');

    Route::put('{type}/{item}', 'GeekCms\Content\Http\Controllers\AdminController@save')
        ->name('content.save.post');
});
