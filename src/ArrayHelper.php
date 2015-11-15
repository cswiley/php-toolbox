<?php

namespace Cswiley\PhpToolbox;

class ArrayHelper
{
    static function array_aflatten($array)
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

    static function array_afill($keys, $value = 1)
    {
        $res = [];
        foreach ($keys as $key) {
            $res[$key] = $value;
        }

        return $res;
    }

    static function array_index_by($array, $key, $group = true)
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