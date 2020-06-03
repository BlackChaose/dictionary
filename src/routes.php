<?php
Route::get('dictionary/slideshow','BlackChaose\Dictionary\Controllers\DictionaryController@slideshow')->name('dictionary.slideshow')->middleware('auth');
Route::get('dictionary/slideshow/{id}','BlackChaose\Dictionary\Controllers\DictionaryController@slideshow_group')->name('dictionary.slideshow_group')->middleware('auth');
Route::resource('dictionary', 'BlackChaose\Dictionary\Controllers\DictionaryController')->middleware('auth');

