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

Auth::routes();



Route::get('/', ['as' => 'results', 'uses' => 'ArticleController@index']);

Route::get('/{id}', ['as' => 'article', 'uses' => 'ArticleController@view'])->where('id', '[A-Za-z0-9-_]+');



Route::group(['middleware' => ['auth']], function() //registered users permissions
{
    // create comment post
    Route::post('add_comment', 'ArticleController@add_comment');

});


Route::group(['middleware' => ['admin']], function() { //admin only permissions
    //create new article form
    Route::get('new', 'ArticleController@new');

    //edit or create article
    Route::get('edit/{id}', ['as' => 'article', 'uses' => 'ArticleController@edit'])->where('id', '[A-Za-z0-9-_]+');

    //delete article
    Route::get('delete/{id}', 'ArticleController@delete');

    // update artilce
    Route::post('update', 'ArticleController@update');
});





