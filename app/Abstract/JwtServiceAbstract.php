<?php

namespace App\Abstract;


abstract class JwtServiceAbstract
{
    protected function generateToken($userId)
    {
        return true;
    }

    protected function decodeToken($token)
    {
        return true;
    }

}
