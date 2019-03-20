<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::redirect('/', '/genres');
Route::post('/genres/{id}/edit', 'GenresController@store');
Route::get('/genres/{id}/edit', 'GenresController@index');
Route::get('/genres', 'GenresController@index');
Route::get('/tracks', 'TracksController@index');
Route::get('/tracks/new', 'TracksController@index');
Route::post('/tracks/new', 'TracksController@store');
Route::get('/docs', 'DocsController@index');