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

Route::get('/',['as' => 'results', 'uses' => 'ArticleController@index']);

Route::get('/{id}',['as' => 'article', 'uses' => 'ArticleController@view'])->where('id', '[A-Za-z0-9-_]+');

Route::get('edit/{id}',['as' => 'article', 'uses' => 'ArticleController@edit'])->where('id', '[A-Za-z0-9-_]+');




       // update post
    Route::post('update','ArticleController@update');
