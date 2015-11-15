<?php

use Illuminate\Support\Debug\Dumper;

/**
 * Escapes html then prints $output
 *
 * @param $output
 */
function o($output)
{
    e($output);
}

/**
 * Dumps a variable for inspection in a browser
 *
 * @param $item
 */
function dbg($item)
{
    array_map(function ($x) {
        (new Dumper)->dump($x);
    }, func_get_args());
}

