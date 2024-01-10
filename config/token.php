<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Token Creation Needs
    |--------------------------------------------------------------------------

    */

    'secret' => env('JWT_SECRET', "sec!ReT423*&"),
    'issuer' => env('JWT_ISSUER', 'spinmatic.com'),
    'expiration' => time() + 3600,

];
