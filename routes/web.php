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

//  sudo chmod -R 777 app/GameProvider/

// Staging
$router->post(uri: '/migrate/staging/{providerCode}', action: 'EntrypointController@staging');
$router->post(uri: '/delete/staging/{providerCode}', action: 'EntrypointController@stagingDelete');

// Production
$router->post(uri: '/migrate/production/{providerCode}', action: 'EntrypointController@production');
$router->post(uri: '/delete/production/{providerCode}', action: 'EntrypointController@productionDelete');