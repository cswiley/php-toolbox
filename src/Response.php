<?php

namespace Cswiley\PhpToolbox;

class Response
{
//    static function show404()
//    {
//        header("HTTP/1.1 404 Not Found");
//        view("errors/404");
//    }
//
//    static function template($id)
//    {
//        echo '<script type="text/html" id="' . $id . '">';
//        view("templates/" . $id);
//        echo '</script>';
//    }

    static function jsonError($message)
    {
        return ['ok' => false, 'error' => $message];
    }

    static function jsonSuccess(Array $message)
    {
        $message['ok'] = true;

        return $message;
    }

    static function isJsonError($response)
    {
        return isset($response['ok']) && $response['ok'] === false && isset($response['error']);
    }
}
