<?php

use CNZ\Helpers\ArrayHelpers as arr;
use CNZ\Helpers\CommonHelpers as hlp;
use CNZ\Helpers\StringHelpers as str;


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

if (!function_exists('is_mobile')) {
    /**
     * Detects if the current browser runs on a mobile device.
     *
     * @param string $userAgent
     * @return bool
     */
    function is_mobile($userAgent = null)
    {
        return hlp::isMobile($userAgent);
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

if (!function_exists('dd')) {
    /**
     * Dumps the content of the given variable and exits the script.
     *
     * @param mixed $var
     */
    function dd($var)
    {
        hlp::dd($var);
    }
}

if (!function_exists('dump')) {
    /**
     * Dumps the content of the given variable.
     *
     * @param mixed $var
     */
    function dump($var)
    {
        hlp::dump($var);
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

if (!function_exists('str_before')) {
    /**
     * Get the portion of a string before a given value.
     *
     * @param string $string
     * @param string $search
     * @return string
     */
    function str_before($search, $string)
    {
        return str::before($search, $string);
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

if (!function_exists('to_array')) {
    /**
     * Converts an object to an array.
     *
     * @param $object
     * @return array
     */
    function to_array($object)
    {
        return arr::fromObject($object);
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
