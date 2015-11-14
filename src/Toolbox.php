<?php

use Illuminate\Support\Debug\Dumper;

if (!function_exists('o')) {

    /**
     * Escape HTML entities in a string.
     *
     * @param $output
     */
    function o($output)
    {
        e($output);
    }
}

if (!function_exists('dbg')) {

    /**
     * Dump the passed variables and continue the script.
     *
     * @param  mixed
     * @return void
     */
    function dbg()
    {
        array_map(function ($x) {
            (new Dumper)->dump($x);
        }, func_get_args());
    }
}

if (!function_exists('maybe')) {

    /**
     * Return value reference when it is not null, otherwise return a fallback
     * @param      $value
     * @param null $fallback
     * @return null
     */
    function maybe(&$value, $fallback = null)
    {
        return (isset($value)) ? $value : $fallback;
    }
}

if (!function_exists('pathJoin')) {

    function pathJoin()
    {
        return join('/', array_filter(func_get_args()));
    }
}


if (!function_exists('array_aflatten')) {

    function array_aflatten($array)
    {
        $flatten = array();
        foreach ($array as $obj) {
            if (!is_array($obj)) {
                $flatten[] = $obj;
                continue;
            }
            foreach ($obj as $key => $val) {
                $flatten[$key] = $val;
            }
        }

        return $flatten;
    }
}

if (!function_exists('array_index_by')) {

    function array_index_by($array, $key, $group = true)
    {
        $results = [];
        foreach ($array as $item) {
            $value = is_object($item) ? $item->$key : $item[$key];
            if ($group) {

                if (!isset($results[$value])) {
                    $results[$value] = [];
                }

                $results[$value][] = $item;
            } else {
                $results[$value] = $item;
            }
        }

        return $results;
    }
}


if (!function_exists('hash_fill')) {

    function hash_fill($keys, $value = 1)
    {
        $res = [];
        foreach ($keys as $key) {
            $res[$key] = $value;
        }

        return $res;
    }
}

if (!function_exists('is_json_error')) {

    function is_json_error($response)
    {
        return isset($response['ok']) && $response['ok'] === false && isset($response['error']);
    }

}

if (!function_exists('json_error')) {

    function json_error($message)
    {
        return ['ok' => false, 'error' => $message];
    }
}

if (!function_exists('json_success')) {

    function json_success(Array $message)
    {
        $message['ok'] = true;

        return $message;
    }
}

if (!function_exists('sql_date')) {

    /**
     * Convert php time phase to a standard SQL format
     *
     * @param string $timePhrase
     * @param string $format
     * @return bool|string
     */
    function sql_date($timePhrase = '', $format = 'Y-m-d H:i:s')
    {
        return (!!$timePhrase) ? date($format, strtotime($timePhrase)) : date($format);
    }
}

if (!function_exists('get')) {

    function get($key)
    {
        if (!isset($_GET[$key])) {
            return false;
        }

        return $_GET[$key];
    }
}

if (!function_exists('post')) {

    function post($key)
    {
        if (!isset($_POST[$key])) {
            return false;
        }

        return $_POST[$key];
    }
}
