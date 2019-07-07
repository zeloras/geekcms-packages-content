<?php

Route::group(['middleware' => ['web', 'permission:admin_access'], 'prefix' => getAdminPrefix('content')], function () {
    Route::group(['middleware' => ['permission:modules_content_admin_list']], function () {
        Route::get('{type}', 'Modules\Content\Http\Controllers\AdminController@index')
            ->name('content')
        ;
    });

    Route::get('{type}/edit/{item}', 'Modules\Content\Http\Controllers\AdminController@edit')
        ->name('content.edit')
    ;

    Route::put('{type}/{item}', 'Modules\Content\Http\Controllers\AdminController@save')
        ->name('content.save.post')
    ;
});
