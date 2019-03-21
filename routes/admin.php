<?php

Route::get('/', 'AdminSongController@index')->name('dashboard');
Route::get('dashboard', 'AdminSongController@index')->name('dashboard');
Route::get('play/karaoke', 'AdminSongController@play_karaoke')->name('play.karaoke');
Route::get('play/song', 'AdminSongController@play_song')->name('play.song');



Route::get('ads', 'AdminSongController@ads')->name('ads');
Route::get('analytics', 'AdminSongController@analytics')->name('analytics');
Route::get('messages', 'AdminSongController@messages')->name('messages');
Route::get('mediamanager', 'AdminSongController@mediamanager')->name('mediamanager');

// Admin Play---------------------------------------------------------------------
Route::get('play/search', 'AdminPlayController@searchView')->name('play.searchview');
Route::get('play/findkaraoke', 'AdminPlayController@findkaraoke');
Route::post('play/addqueue', 'AdminPlayController@addQueue')->name('play.addqueue');
Route::post('play/addmultiqueue', 'AdminPlayController@addMultiQueue')->name('play.addmultiqueue');
Route::get('play/find', 'AdminPlayController@find');
Route::get('play/findonly', 'AdminPlayController@findOnly');

// Admin Edit------------------------------------------------------------------
Route::get('edit/karaoke', 'AdminEditController@index')->name('edit.karaoke');
Route::get('edit/song', 'AdminSongController@song_edit')->name('edit.song');
Route::post('edit/karaoke','AdminEditController@karaokeStore')->name('edit.karaoke.store');
Route::get('edit/findnormal','AdminEditController@findNormal');

// Admin Settings----------------------------------------------------------------------------
Route::get('settings', 'AdminSettingController@index')->name('settings');
Route::post('settings/superstore','AdminSettingController@superStore')->name('settings.superstore');
Route::post('settings/normalstore','AdminSettingController@normalStore')->name('settings.normalstore');
Route::post('settings/adminupdate', 'AdminSettingController@adminUpdate')->name('settings.update');

// DB::listen(function ($event) {    
//     var_dump($event->sql);
//     // var_dump($event->bindings);
//     // var_dump($event->time);
// });
