<?php

namespace Cswiley\HtmlToolbox;

/**
 * Escapes html then prints $output
 *
 * @param $output
 */
function o($output)
{
    echo htmlentities($output);
}

function e($output)
{
    o($output);
}

/**
 * Dumps a variable for inspection in a browser
 *
 * @param $item
 */
function dbg($item)
{
    echo "<pre>";
    var_dump($item);
    echo "</pre>";
}

function dd($item)
{
    dbg($item);
    die();
}

/**
 * Partial function application
 * @return \Closure
 */
function partial(/* $func, $args... */)
{
    $args = func_get_args();
    $func = array_shift($args);

    return function () use ($func, $args) {
        return call_user_func_array($func, array_merge($args, func_get_args()));
    };
}

function maybeValue(&$value, $fallback = null)
{
    return (isset($value)) ? $value : $fallback;
}

function pathJoin()
{
    $args = func_get_args();

    return join('/', array_filter($args));
}

function arrayFlatten($array)
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

function hashFill($keys, $value = 1)
{
    $res = [];
    foreach ($keys as $key) {
        $res[$key] = $value;
    }

    return $res;
}

function isJsonError($response)
{
    return isset($response['ok']) && $response['ok'] === false && isset($response['error']);
}

function jsonError($message)
{
    return ['ok' => false, 'error' => $message];
}

function jsonSuccess(Array $message)
{
    $message['ok'] = true;

    return $message;
}

function arrayIndexBy($array, $key, $group = true)
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
function sqlDate($timePhrase = '', $format = 'Y-m-d H:i:s')
{
    return (!!$timePhrase) ? date($format, strtotime($timePhrase)) : date($format);
}

function show404()
{
    header("HTTP/1.1 404 Not Found");
    view("errors/404");
}

function template($id)
{
    echo '<script type="text/html" id="' . $id . '">';
    view("templates/" . $id);
    echo '</script>';
}

function get($key)
{
    if (!isset($_GET[$key])) {
        return false;
    }

    return $_GET[$key];
}

function post($key)
{
    if (!isset($_POST[$key])) {
        return false;
    }

    return $_POST[$key];
}