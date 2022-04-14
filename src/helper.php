<?php

use Symfony\Component\VarDumper\VarDumper;

if (!function_exists('dd')) {
    function dd()
    {
        $args = func_get_args();
        VarDumper::dump(...$args);
        die();
    }
}

if (!function_exists('d')) {
    function d()
    {
        $args = func_get_args();
        VarDumper::dump(...$args);
    }
}
