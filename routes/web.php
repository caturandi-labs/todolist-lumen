<?php

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

$router->get('/todos', 'TodosController@index');
$router->get('/todos/{id}', 'TodosController@show');
$router->post('/todos', 'TodosController@store');
$router->patch('/todos/{id}', 'TodosController@update');
$router->delete('/todos/{id}', 'TodosController@destroy');


$router->get('/articles', 'ArticlesController@index');
$router->get('/articles/{id}', 'ArticlesController@show');
$router->post('/articles', 'ArticlesController@store');
$router->patch('/articles/{id}', 'ArticlesController@update');
$router->delete('/articles/{id}', 'ArticlesController@destroy');
