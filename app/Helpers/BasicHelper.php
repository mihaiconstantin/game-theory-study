<?php

namespace App\Helpers;


class BasicHelper
{

    /**
     * Generate a random string of a given length.
     *
     * @param int $length
     * @return string
     */
    public static function userCode(int $length = 10) : string
    {
        return str_random($length);
    }


    /**
     * Reindex the keys of an array to start at 1 instead of 0
     * and respect the order.
     *
     * @param array $array
     * @return array
     */
    public static function reindexArray(array $array) : array
    {
        return array_combine(range(1, count($array)), $array);
    }


    /**
     * Parse and return the right side of a chain (i.e., index 1).
     *
     * @param string $chain
     * @return array
     */
    public static function parseChainRight(string $chain) : array
    {
        return array_map(function($n) {
            return explode('#', $n)[1];
        }, explode(';', $chain));
    }


    /**
     * Parse and return the left side of a chain (i.e., index 0).
     *
     * @param string $chain
     * @return array
     */
    public static function parseChainLeft(string $chain) : array
    {
        return array_map(function($n) {
            return explode('#', $n)[0];
        }, explode(';', $chain));
    }


}