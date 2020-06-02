<?php
Route::get('dictionary/slideshow','BlackChaose\Dictionary\Controllers\DictionaryController@slideshow')->name('dictionary.slideshow');
Route::get('dictionary/slideshow/{id}','BlackChaose\Dictionary\Controllers\DictionaryController@slideshow_group')->name('dictionary.slideshow_group');
Route::resource('dictionary', 'BlackChaose\Dictionary\Controllers\DictionaryController');

