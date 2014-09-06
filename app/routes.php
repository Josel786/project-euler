<?php
Route::get('/', ['as' => 'home', 'uses' => 'ProblemsController@index']);
Route::resource('problems', 'ProblemsController');
