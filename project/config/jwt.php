<?php

return [
    'key' => env('JWT_SECRET', ''),
    'algo' => env('JWT_ALGO', 'HS256'),
];
