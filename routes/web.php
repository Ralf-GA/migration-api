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

$router->group(['prefix' => 'migrate'], function () use ($router) {
    $router->post('/red', ['uses' => 'RedMigrateController@migrate']);

    // ORS
    $router->group(['prefix' => 'ORS'], function () use ($router) {
        $router->post('/Staging',    ['uses' => 'OrsStgController@migrate']);
        $router->post('/Production', ['uses' => 'OrsProdController@migrate']);
    });

    // SBO
    $router->group(['prefix' => 'SBO'], function () use ($router) {
        $router->post('/Staging',    ['uses' => 'SboStgController@migrate']);
        $router->post('/Production', ['uses' => 'SboProdController@migrate']);
    });

    // SAB

    $router->group(['prefix' => 'SAB'], function () use ($router) {
        // $router->post('/Staging',    ['uses' => 'SboStgController@migrate']);
        // $router->post('/Production', ['uses' => 'SboProdController@migrate']);
    });
});
