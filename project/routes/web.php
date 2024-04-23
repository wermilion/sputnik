<?php

use Laravel\Lumen\Routing\Router;

/** @var Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('lottery_games', 'LotteryGameController@index');
    $router->get('lottery_game_matches', 'LotteryGameMatchController@getByLotteryGame');

    $router->group(['prefix' => 'users'], function () use ($router) {
        $router->post('register', 'UserController@register');
        $router->post('login', 'AuthController@login');

        $router->group(['middleware' => 'auth'], function () use ($router) {
            $router->get('', [
                'uses' => 'UserController@index',
                'middleware' => 'admin',
            ]);

            $router->put('{id}', 'UserController@update');
            $router->delete('{id}', 'UserController@destroy');
        });
    });

    $router->group(['prefix' => 'lottery_game_matches', 'middleware' => ['auth', 'admin']], function () use ($router) {
        $router->post('', 'LotteryGameMatchController@store');
        $router->put('{id}', 'LotteryGameMatchController@update');
    });
});
