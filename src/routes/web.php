<?php


Route::group(['namespace' => 'MAZE\MFM\Controllers'], function()
{
    Route::get('/mfm/get/{path}', 'MFMController@get');
    Route::get('/mfm/get-files/{path}', 'MFMController@getFiles');
    Route::get('/mfm/get-ext/{path}', 'MFMController@getFileType');
});
