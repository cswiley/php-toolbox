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

    function dbg()
    {
        array_map(function ($x) {
            (new Dumper)->dump($x);
        }, func_get_args());
    }

    function maybe(&$value, $fallback = null)
    {
        return (isset($value)) ? $value : $fallback;
    }

    function pathJoin()
    {
        $args = func_get_args();

        return join('/', array_filter($args));
    }

    static function arrayFlatten($array)
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

    static function hashFill($keys, $value = 1)
    {
        $res = [];
        foreach ($keys as $key) {
            $res[$key] = $value;
        }

        return $res;
    }

    static function isJsonError($response)
    {
        return isset($response['ok']) && $response['ok'] === false && isset($response['error']);
    }

    static function jsonError($message)
    {
        return ['ok' => false, 'error' => $message];
    }

    static function jsonSuccess(Array $message)
    {
        $message['ok'] = true;

        return $message;
    }

    static function arrayIndexBy($array, $key, $group = true)
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

    /**
     * Convert php time phase to a standard SQL format
     *
     * @param string $timePhrase
     * @param string $format
     * @return bool|string
     */
    static function sqlDate($timePhrase = '', $format = 'Y-m-d H:i:s')
    {
        return (!!$timePhrase) ? date($format, strtotime($timePhrase)) : date($format);
    }

    static function get($key)
    {
        if (!isset($_GET[$key])) {
            return false;
        }

        return $_GET[$key];
    }

    static function post($key)
    {
        if (!isset($_POST[$key])) {
            return false;
        }

        return $_POST[$key];
    }
