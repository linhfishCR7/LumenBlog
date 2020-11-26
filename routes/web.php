<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->get('foo', function () {
    return view('example.hello');
});
$router->group(['prefix'=>'api'], function() use($router){
    $router->get('/blogs', 'BlogsController@index');
    $router->post('/blog', 'BlogsController@create');
    $router->get('/blog/{id}', 'BlogsController@show');
    $router->put('/blog/{id}', 'BlogsController@update');
    $router->delete('/blog/{id}', 'BlogsController@delete');
});
$router->group(['prefix'=>'api'], function() use($router){
    $router->get('/products', 'ProductController@index');
    $router->post('/product', 'ProductController@create');
    $router->get('/product/{id}', 'ProductController@show');
    $router->put('/product/{id}', 'ProductController@update');
    $router->delete('/product/{id}', 'ProductController@delete');
});
// $router->get('/blogs', 'BlogsController@index');
// $router->get('/blogs/{id}', 'BlogsController@show');
// $router->post('/blogs', 'BlogsController@create');
// $router->put('/blogs/{id}', 'BlogsController@blogsupdate');
// $router->delete('/blogs/{id}', 'BlogsController@blogsdelete');


// $router->group(['prefix' => 'api'], function () use ($router) {
//     $router->get('authors',  ['uses' => 'AuthorController@showAllAuthors']);
  
//     $router->get('authors/{id}', ['uses' => 'AuthorController@showOneAuthor']);
  
//     $router->post('authors', ['uses' => 'AuthorController@create']);
  
//     $router->delete('authors/{id}', ['uses' => 'AuthorController@delete']);
  
//     $router->put('authors/{id}', ['uses' => 'AuthorController@update']);
//   });


