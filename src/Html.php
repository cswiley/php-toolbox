<?php

namespace Cswiley\PhpToolbox;

class Html
{
    static function maybe(&$value, $fallback = null)
    {
        return (isset($value)) ? $value : $fallback;
    }

    static function pathJoin()
    {
        $args = func_get_args();

        return join('/', array_filter($args));
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

}
