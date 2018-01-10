<?php

namespace CNZ\Helpers;

class CommonHelpers
{
    /**
     * Detects if the current browser runs on a mobile device.
     *
     * @param string $userAgent
     * @return bool
     */
    public static function isMobile($userAgent = null)
    {
        if (!isset($userAgent)) {
            $userAgent = $_SERVER['HTTP_USER_AGENT'];
        }

        if ($userAgent !== null && (stripos($userAgent, 'mobile') !== false
                || stripos($userAgent, 'android') !== false
                || stripos($userAgent, 'silk/') !== false
                || stripos($userAgent, 'kindle') !== false
                || stripos($userAgent, 'blackberry') !== false
                || stripos($userAgent, 'windows phone') !== false
                || stripos($userAgent, 'opera') !== false)) {
            return true;
        }

        return false;
    }

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