<?php

Route::group(
    [
        'prefix' => 'gettext',
        'namespace' => 'Anavel\Gettext\Http\Controllers'
    ],
    function () {
        Route::get('/edit/{locale?}', [
            'as'   => 'anavel-gettext.edit',
            'uses' => 'MainController@edit'
        ]);

        Route::put('/{locale}', [
            'as'   => 'anavel-gettext.update',
            'uses' => 'MainController@update'
        ]);
    }
);
