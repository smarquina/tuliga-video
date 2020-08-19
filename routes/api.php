<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/** @var \Dingo\Api\Routing\Router $api */
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', ['namespace' => 'App\Http\Controllers\Api', 'middleware' => ['api']], function ($api) {
    /** @var Dingo\Api\Routing\Router $api */

    // Public Routes
    $api->group(array('prefix' => 'films', 'as' => 'films', 'namespace' => 'Film'), function ($api) {
        $api->get('all', 'FilmController@listFilms')->name('all');
        $api->post('book/price', 'FilmController@calculatePrice')->name('calculatePrice');

        $api->get('type/all', 'FilmTypeController@listAll')->name('type.all');
    });
});
