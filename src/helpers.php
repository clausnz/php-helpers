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
use CNZ\Helpers\Mob as mob;
use CNZ\Helpers\Str as str;
use CNZ\Helpers\User as user;
use CNZ\Helpers\Util as util;


// @group(Mobile)

if (!function_exists('is_mobile')) {
    /**
     * Detects if the current user agent is running on a mobile device.
     *
     * @param string $userAgent
     * @return bool
     */
    function is_mobile($userAgent = null)
    {
        return mob::isMobile($userAgent);
    }
}

if (!function_exists('is_touch_device')) {
    /**
     * Determes if the current user agent is running on a mobile touch device.
     *
     * @param null $userAgent
     * @return bool
     */
    function is_touch_device($userAgent = null)
    {
        return mob::isTouchDevice($userAgent);
    }
}

if (!function_exists('is_smartphone')) {
    /**
     * Determes if the current user agent is running on a smartphone.
     *
     * @param null $userAgent
     * @return bool
     */
    function is_smartphone($userAgent = null)
    {
        return mob::isSmartphone($userAgent);
    }
}

if (!function_exists('is_tablet')) {
    /**
     * Determes if the current user agent is a tablet device.
     *
     * @param string $userAgent
     * @return bool
     */
    function is_tablet($userAgent = null)
    {
        return mob::isTablet($userAgent);
    }
}

if (!function_exists('is_desktop')) {
    /**
     * Determes if the current user agent is a desktop computer.
     *
     * @param string $userAgent
     * @return bool
     */
    function is_desktop($userAgent = null)
    {
        return mob::isDesktop($userAgent);
    }
}

if (!function_exists('is_ios')) {
    /**
     * Determes if the current user agent is running on an iOS operating system.
     *
     * @param null $userAgent
     * @return bool|int|null
     */
    function is_ios($userAgent = null)
    {
        return mob::isIOS($userAgent);
    }
}

if (!function_exists('is_android')) {
    /**
     * Determes if the current user agent is running on an Android device.
     *
     * @param string $userAgent
     * @return bool
     */
    function is_android($userAgent = null)
    {
        return mob::isAndroid($userAgent);
    }
}

if (!function_exists('is_iphone')) {
    /**
     * Determes if the current user agent is running on an iPhone device.
     *
     * @param string $userAgent
     * @return bool
     */
    function is_iphone($userAgent = null)
    {
        return mob::isIphone($userAgent);
    }
}

if (!function_exists('is_samsung')) {
    /**
     * Determes if the current user agent is running on a Samsung device.
     *
     * @param null $userAgent
     * @return bool|int|null
     */
    function is_samsung($userAgent = null)
    {
        return mob::isSamsung($userAgent);
    }
}

// @endgroup(Mobile)

// @group(User)

if (!function_exists('is_email')) {
    /**
     * Validate a given email address.
     *
     * @param string $email
     * @return boolean
     */
    function is_email($email)
    {
        return user::isEmail($email);
    }
}

if (!function_exists('user_ip')) {
    /**
     * Returns the user ip-adresse.
     * See: https://stackoverflow.com/q/3003145/1108161
     *
     * @param bool $cli
     * @return string
     */
    function user_ip($cli = false)
    {
        return user::ip($cli);
    }
}

if (!function_exists('is_robot')) {
    /**
     * Determes if the current visitor is a bot/crawler/spider.
     *
     * @param string $userAgent
     * @return boolean
     */
    function is_robot($userAgent = null)
    {
        return user::isRobot($userAgent);
    }
}

if (!function_exists('crypt_password')) {
    /**
     * Creates a secure hash from a given password. Use the CRYPT_BLOWFISH algorithm.
     *
     * @param string $password
     * @return string
     */
    function crypt_password($password)
    {
        return user::cryptPassword($password);
    }
}

if (!function_exists('is_password')) {
    /**
     * Verifies that a password matches a crypted password (CRYPT_BLOWFISH algorithm).
     *
     * @param string $password
     * @param $cryptedPassword
     * @return boolean
     */
    function is_password($password, $cryptedPassword)
    {
        return user::isPassword($password, $cryptedPassword);
    }
}

// @endgroup(User)

// @group(Array)

if (!function_exists('array_first')) {
    /**
     * Returns the first element of an array.
     *
     * @param array $array
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
     * @return mixed $value
     */
    function array_last($array)
    {
        return arr::last($array);
    }
}

if (!function_exists('to_array')) {
    /**
     * Converts an object to an array.
     *
     * @param $object
     * @return array
     */
    function to_array($object)
    {
        return arr::toArray($object);
    }
}

if (!function_exists('to_object')) {
    /**
     * Converts an array to an object.
     *
     * @param array $array
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
     * @return string
     */
    function str_after($search, $string)
    {
        return str::after($search, $string);
    }
}

if (!function_exists('str_between')) {
    /**
     * Return the content in a string between a left and right element.
     *
     * @param string $left
     * @param string $right
     * @param string $string
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
     * @param array $inserts
     * @param string $string
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
     * @param  int $limit
     * @param  string $end
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
     * @param  int $limit
     * @param  string $end
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
     * @param string $haystack
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
     * @param string $haystack
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
     * @param string $haystack
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
     * @param string $haystack
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
     * @param string $haystack
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
     * @param string $haystack
     * @return bool
     */
    function str_iends_with($needle, $haystack)
    {
        return str::endsWithIgnoreCase($needle, $haystack);
    }
}

// @endgroup(String)

// @group(Utils)

if (!function_exists('dump')) {
    /**
     * Dumps the content of the given variable.
     *
     * @codeCoverageIgnore
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
     * @param mixed $var
     */
    function dd($var)
    {
        util::dd($var);
    }
}

// @endgroup(Utils)