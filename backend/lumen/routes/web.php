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

$router->group(['prefix' => 'api'], function() use ($router) {
    // POST: api/register
    $router->post('register', 'AuthController@register');

    // POST: api/login
    $router->post('login', 'AuthController@login');

    // GET: api/users
    $router->get('users', 'UserController@index');

    // GET: api/users/$id
    $router->get('users/{id}', 'UserController@show');

    // GET: api/networks
    $router->get('networks', 'NetworkController@index');

    // POST: api/networks
    $router->post('networks', 'NetworkController@store');

    // POST: api/networks/$id
    $router->post('networks/{id}', 'NetworkController@edit');

    // GET: api/logs
    $router->get('logs', 'LogController@index');

    // GET: api/logs/$id
    $router->get('logs/{id}', 'LogController@show');
});
