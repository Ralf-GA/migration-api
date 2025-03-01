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

// $router->group(['prefix' => 'migrate'], function () use ($router) {
//     $router->group(['prefix' => 'test'], function () use ($router) {
//         $router->post('/gamelist', ['uses' => 'testController@testing']);
//     });

//     $router->post('/red', ['uses' => 'RedMigrateController@migrate']);

//     // ORS
//     $router->group(['prefix' => 'ors'], function () use ($router) {
//         $router->post('/staging', ['uses' => 'OrsStgController@migrate']);
//         $router->post('/production', ['uses' => 'OrsProdController@migrate']);
//     });

//     // SBO
//     $router->group(['prefix' => 'sbo'], function () use ($router) {
//         $router->post('/staging', ['uses' => 'SboStgController@migrate']);
//         $router->post('/production', ['uses' => 'SboProdController@migrate']);
//     });

//     // SAB
//     $router->group(['prefix' => 'sab'], function () use ($router) {
//         $router->post('/staging', ['uses' => 'SabStgController@migrate']);
//         $router->post('/production', ['uses' => 'SabProdController@migrate']);
//     });

//     // CQ9
//     $router->group(['prefix' => 'cq9'], function () use ($router) {
//         $router->post('/staging', ['uses' => 'Cq9StgController@migrate']);
//     });

//     // JDB
//     $router->group(['prefix' => 'jdb'], function () use ($router) {
//         $router->post('/staging', ['uses' => 'JdbStgController@migrate']);
//         $router->post('/production', ['uses' => 'JdbProdController@migrate']);
//     });

//     // HCG
//     $router->group(['prefix' => 'hcg'], function () use ($router) {
//         $router->post('/staging', ['uses' => 'HcgStgController@migrate']);
//         $router->post('/production', ['uses' => 'HcgProdController@migrate']);
//     });

//     // PLA
//     $router->group(['prefix' => 'pla'], function () use ($router) {
//         $router->post('/staging', ['uses' => 'PlaStgController@migrate']);
//         $router->post('/production', ['uses' => 'PlaProdController@migrate']);
//     });

//     // PCA
//     $router->group(['prefix' => 'pca'], function () use ($router) {
//         $router->post('/staging', ['uses' => 'PcaStgController@migrate']);
//         $router->post('/production', ['uses' => 'PcaProdController@migrate']);
//     });

//     // BES
//     $router->group(['prefix' => 'bes'], function () use ($router) {
//         $router->post('/staging', ['uses' => 'BesStgController@migrate']);
//     });

//     // PLA
//     $router->group(['prefix' => 'pla/v2'], function () use ($router) {
//         // $router->post('/staging', ['uses' => 'PlaStgV2Controller@migrate']);
//         // $router->post('delete/production', ['uses' => 'PlaProdController@delete']);
//         $router->post('/production', ['uses' => 'PlaProdV2Controller@migrate']);
//     });

//     // PCA
//     $router->group(['prefix' => 'pca/v2'], function () use ($router) {
//         $router->post('/staging', ['uses' => 'PcaStgV2Controller@migrate']);
//         // $router->post('/production', ['uses' => 'PlaProdController@migrate']);
//     });
// });
