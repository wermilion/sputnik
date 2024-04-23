<?php

namespace App\Services;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use stdClass;

readonly class JwtService
{
    public function __construct(private string $key, private string $algorithm)
    {
    }

    public function encode(array $payload): string
    {
        return JWT::encode($payload, $this->key, $this->algorithm);
    }

    public function decode(string $token): stdClass
    {
        return JWT::decode($token, new Key(config('jwt.key'), config('jwt.algo')));
    }
}
