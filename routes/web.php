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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/article/add', 'HomeController@add');

Route::post('/article/create',['as' => 'articles.create','uses' => 'HomeController@store']);

Route::get('/articles/{slug}',['as' => 'articles','uses' => 'HomeController@viewArticle']);

Route::get('/', function () { return redirect("/home"); });

Route::get('articles/images/{filename}',function($filename){
	$path=storage_path("app/public/$filename");
	if(!\File::exists($path)) abort(404);
	$file = \File::get($path);
	$type =\File::mimeType($path);
	$response = Response::make($file,200);
	$response->header("Content-Type",$type);
	return $response;
});

