<?php
/**
 * Helper functions that provide easy access to useful php array functions.
 *
 * @author      Claus Bayer <claus.bayer@gmail.com>
 * @version     1.0
 * @link        https://github.com/clausnz/php-helpers
 * @license     MIT
 *
 */

use CNZ\Helpers\Arr as arr;
use CNZ\Helpers\Dev as dev;
use CNZ\Helpers\Str as str;
use CNZ\Helpers\Util as util;


// @group(Device)

if (!function_exists('is_mobile')) {
    /**
     * Detects if the current device is a mobile device (Smartphone/Tablet/Handheld).
     *
     * @return bool
     */
    function is_mobile()
    {
        return dev::isMobile();
    }
}

if (!function_exists('is_smartphone')) {
    /**
     * Determes if the current device is a smartphone.
     *
     * @return bool
     */
    function is_smartphone()
    {
        return dev::isSmartphone();
    }
}

if (!function_exists('is_tablet')) {
    /**
     * Determes if the current device is a tablet.
     *
     * @return bool
     */
    function is_tablet()
    {
        return dev::isTablet();
    }
}

if (!function_exists('is_desktop')) {
    /**
     * Determes if the current device is a desktop computer.
     *
     * @return bool
     */
    function is_desktop()
    {
        return dev::isDesktop();
    }
}

if (!function_exists('is_robot')) {
    /**
     * Determes if the current device is a bot/crawler/spider.
     *
     * @return bool
     */
    function is_robot()
    {
        return dev::isRobot();
    }
}

if (!function_exists('is_ios')) {
    /**
     * Determes if the current device is running an iOS operating system.
     *
     * @return bool
     */
    function is_ios()
    {
        return dev::isIOS();
    }
}

if (!function_exists('is_android')) {
    /**
     * Determes if the current device is running an Android operating system.
     *
     * @return bool
     */
    function is_android()
    {
        return dev::isAndroid();
    }
}

if (!function_exists('is_iphone')) {
    /**
     * Determes if the current device is an iPhone.
     *
     * @return bool
     */
    function is_iphone()
    {
        return dev::isIphone();
    }
}

if (!function_exists('is_samsung')) {
    /**
     * Determes if the current device is from Samsung.
     *
     * @return bool
     */
    function is_samsung()
    {
        return dev::isSamsung();
    }
}

// @endgroup(Device)

// @group(Array)

if (!function_exists('array_first')) {
    /**
     * Returns the first element of an array.
     *
     * @param array $array
     *
     * @return mixed $value
     */
    function array_first($array)
    {
        return arr::first($array);
    }
}

if (!function_exists('array_last')) {
    /**
     * Returns the last element of an array.
     *
     * @param array $array
     *
     * @return mixed $value
     */
    function array_last($array)
    {
        return arr::last($array);
    }
}

if (!function_exists('to_array')) {
    /**
     * Converts a string or an object to an array.
     *
     * @param $var
     *
     * @return mixed
     */
    function to_array($var)
    {
        return arr::toArray($var);
    }
}

if (!function_exists('to_object')) {
    /**
     * Converts an array to an object.
     *
     * @param array $array
     *
     * @return object
     */
    function to_object($array)
    {
        return arr::toObject($array);
    }
}

if (!function_exists('is_assoc')) {
    /**
     * Detects if the given value is an associative array.
     *
     * @param array $array
     *
     * @return bool
     */
    function is_assoc($array)
    {
        return arr::isAssoc($array);
    }
}

// @endgroup(Array)

// @group(String)

if (!function_exists('str_before')) {
    /**
     * Get the portion of a string before a given value.
     *
     * @param string $search
     * @param string $string
     *
     * @return string
     */
    function str_before($search, $string)
    {
        return str::before($search, $string);
    }
}

if (!function_exists('str_after')) {
    /**
     * Return the remainder of a string after a given value.
     *
     * @param string $search
     * @param string $string
     *
     * @return string
     */
    function str_after($search, $string)
    {
        return str::after($search, $string);
    }
}

if (!function_exists('str_after_last')) {
    /**
     * Return the remainder of a string after the last occurrence of a search value.
     *
     * @param string $search
     * @param string $string
     *
     * @return string
     */
    function str_after_last($search, $string)
    {
        return str::afterLast($search, $string);
    }
}

if (!function_exists('str_between')) {
    /**
     * Return the content in a string between a left and right element.
     *
     * @param string $left
     * @param string $right
     * @param string $string
     *
     * @return array
     */
    function str_between($left, $right, $string)
    {
        return str::between($left, $right, $string);
    }
}

if (!function_exists('str_insert')) {
    /**
     * Inserts one or more strings into another string on a defined position.
     *
     * @param array  $inserts
     * @param string $string
     *
     * @return string
     */
    function str_insert($inserts, $string)
    {
        return str::insert($inserts, $string);
    }
}

if (!function_exists('str_limit')) {
    /**
     * Limit the number of characters in a string. Put value of $end to the string end.
     *
     * @param  string $string
     * @param  int    $limit
     * @param  string $end
     *
     * @return string
     */
    function str_limit($string, $limit = 100, $end = '...')
    {
        return str::limit($string, $limit, $end);
    }
}

if (!function_exists('str_limit_words')) {
    /**
     * Limit the number of words in a string. Put value of $end to the string end.
     *
     * @param  string $string
     * @param  int    $limit
     * @param  string $end
     *
     * @return string
     */
    function str_limit_words($string, $limit = 10, $end = '...')
    {
        return str::limitWords($string, $limit, $end);
    }
}

if (!function_exists('str_contains')) {
    /**
     * Tests if a string contains a given element
     *
     * @param string|array $needle
     * @param string       $haystack
     *
     * @return bool
     */
    function str_contains($needle, $haystack)
    {
        return str::contains($needle, $haystack);
    }
}

if (!function_exists('str_icontains')) {
    /**
     * Tests if a string contains a given element. Ignore case sensitivity.
     *
     * @param string|array $needle
     * @param string       $haystack
     *
     * @return bool
     */
    function str_icontains($needle, $haystack)
    {
        return str::containsIgnoreCase($needle, $haystack);
    }
}

if (!function_exists('str_starts_with')) {
    /**
     * Determine if a given string starts with a given substring.
     *
     * @param string|array $needle
     * @param string       $haystack
     *
     * @return bool
     */
    function str_starts_with($needle, $haystack)
    {
        return str::startsWith($needle, $haystack);
    }
}

if (!function_exists('str_istarts_with')) {
    /**
     * Determine if a given string starts with a given substring. Ignore case sensitivity.
     *
     * @param string|array $needle
     * @param string       $haystack
     *
     * @return bool
     */
    function str_istarts_with($needle, $haystack)
    {
        return str::startsWithIgnoreCase($needle, $haystack);
    }
}

if (!function_exists('str_ends_with')) {
    /**
     * Determine if a given string ends with a given substring.
     *
     * @param string|array $needle
     * @param string       $haystack
     *
     * @return bool
     */
    function str_ends_with($needle, $haystack)
    {
        return str::endsWith($needle, $haystack);
    }
}

if (!function_exists('str_iends_with')) {
    /**
     * Determine if a given string ends with a given substring.
     *
     * @param string|array $needle
     * @param string       $haystack
     *
     * @return bool
     */
    function str_iends_with($needle, $haystack)
    {
        return str::endsWithIgnoreCase($needle, $haystack);
    }
}

// @endgroup(String)

// @group(Utils)

if (!function_exists('ip')) {
    /**
     * Returns the user ip-adresse.
     * See: https://stackoverflow.com/q/3003145/1108161
     *
     * @return string|null
     * The detected ip address, false otherwise.
     */
    function ip()
    {
        return util::ip();
    }
}

if (!function_exists('is_email')) {
    /**
     * Validate a given email address.
     *
     * @param string $email
     *
     * @return bool
     */
    function is_email($email)
    {
        return util::isEmail($email);
    }
}

if (!function_exists('dump')) {
    /**
     * Dumps the content of the given variable.
     *
     * @codeCoverageIgnore
     *
     * @param mixed $var
     */
    function dump($var)
    {
        util::dump($var);
    }
}

if (!function_exists('dd')) {
    /**
     * Dumps the content of the given variable and exits the script.
     *
     * @codeCoverageIgnore
     *
     * @param mixed $var
     */
    function dd($var)
    {
        util::dd($var);
    }
}

if (!function_exists('crypt_password')) {
    /**
     * Creates a secure hash from a given password. Uses the CRYPT_BLOWFISH algorithm.
     *
     * @param string $password
     *
     * @return string
     */
    function crypt_password($password)
    {
        return util::cryptPassword($password);
    }
}

if (!function_exists('is_password')) {
    /**
     * Verifies that a password matches a crypted password (CRYPT_BLOWFISH algorithm).
     *
     * @param string $password
     * @param        $cryptedPassword
     *
     * @return bool
     */
    function is_password($password, $cryptedPassword)
    {
        return util::isPassword($password, $cryptedPassword);
    }
}

// @endgroup(Utils)