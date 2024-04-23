<?php

namespace App\Providers;

use App\Models\User;
use App\Services\JwtService;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Contracts\Auth\Factory as AuthFactory;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @param AuthFactory $auth
     * @return void
     */
    public function boot(AuthFactory $auth): void
    {
        $auth->viaRequest('token', function ($request) {
            try {
                if (!$request->bearerToken()) {
                    return false;
                }

                $userId = JWT::decode($request->bearerToken(), new Key(config('jwt.key'), config('jwt.algo')))->sub;

                if (!$user = User::query()->find($userId)) {
                    return false;
                }

                return $user;
            } catch (Exception $e) {
                return false;
            }
        });
    }
}
