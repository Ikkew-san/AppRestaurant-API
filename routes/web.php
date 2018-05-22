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

$router->get('/key', function () use ($router) {
    return str_random(32);
});

/*--------------------------------------------------------------------------*/

$router->get('/typefood', 'AppController@getTypefood');
$router->get('/typefood/{id}', 'AppController@getFoodList');
$router->get('/promotion', 'AppController@getPromotion');
$router->get('/favorite', 'AppController@getFavorite');

$router->get('/basket', 'AppController@getBasket');

// user
$router->post('/register', 'AuthenController@create');
$router->post('/authen', 'AuthenController@authen');
$router->get('/profile/{id}', 'AuthenController@profile');