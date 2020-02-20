<?php




Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/run_check_command', 'SiteController@checkSsl')->name('run_check_command');
