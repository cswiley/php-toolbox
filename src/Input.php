<?php

namespace Cswiley\PhpToolbox;

class Input
{
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
}