<?php

namespace App\Helpers;


class Generate
{

    public static function userCode($length = 10)
    {
        return str_random($length);
    }


}