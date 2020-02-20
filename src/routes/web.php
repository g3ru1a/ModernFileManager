<?php


Route::group(['namespace' => 'MAZE\MFM\Controllers'], function()
{
    Route::get('/mfm/get/{path}', 'MFMController@get');
});
