<?php

Route::group(
    [
        'prefix' => 'gettext',
        'namespace' => 'ANavallaSuiza\Adoadomin\Gettext\Http\Controllers'
    ],
    function () {
        Route::get('/edit/{locale?}', [
            'as'   => 'adoadomin-gettext.edit',
            'uses' => 'MainController@edit'
        ]);

        Route::put('/{locale}', [
            'as'   => 'adoadomin-gettext.update',
            'uses' => 'MainController@update'
        ]);
    }
);
