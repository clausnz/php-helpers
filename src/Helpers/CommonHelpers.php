<?php

namespace CNZ\Helpers;

class CommonHelpers
{
    /**
     * Dumps the content of the given variable and exits the script.
     *
     * @param mixed $var
     */
    public static function dd($var)
    {
        static::dump($var);
        die();
    }

    /**
     * Dumps the content of the given variable.
     *
     * @param mixed $var
     */
    public static function dump($var)
    {
        if (php_sapi_name() == 'cli') {
            print_r($var);
        } else {
            highlight_string("<?php\n" . var_export($var, true));
        }
    }

}