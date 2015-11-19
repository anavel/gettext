<?php

Route::group(
    [
        'prefix' => 'gettext',
        'namespace' => 'ANavallaSuiza\Adoadomin\Gettext\Http\Controllers'
    ],
    function () {
        Route::get('/edit', [
            'as'   => 'adoadomin-gettext.edit',
            'uses' => 'MainController@edit'
        ]);

        Route::put('/edit', [
            'as'   => 'adoadomin-gettext.update',
            'uses' => 'MainController@update'
        ]);
    }
);
