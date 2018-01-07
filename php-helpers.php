<?php


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
        foreach ((array)$needle as $ndl) {
            if (strstr($haystack, $ndl)) {
                return true;
            }
        }

        return false;
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
        $hs = strtolower($haystack);

        foreach ((array)$needle as $ndl) {
            if (strstr($hs, strtolower($ndl))) {
                return true;
            }
        }

        return false;
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
        foreach ((array)$needle as $ndl) {
            if ($ndl !== '' && substr($haystack, 0, strlen($ndl)) === (string)$ndl) {
                return true;
            }
        }

        return false;
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
        $hs = strtolower($haystack);

        foreach ((array)$needle as $ndl) {
            $n = strtolower($ndl);
            if ($n !== '' && substr($hs, 0, strlen($n)) === (string)$n) {
                return true;
            }
        }

        return false;
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
        foreach ((array)$needle as $ndl) {
            $length = strlen($ndl);
            if ($length === 0 || (substr($haystack, -$length) === (string)$ndl)) {
                return true;
            }
        }

        return false;
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
        $hs = strtolower($haystack);

        foreach ((array)$needle as $ndl) {
            $n = strtolower($ndl);
            $length = strlen($ndl);
            if ($length === 0 || (substr($hs, -$length) === (string)$n)) {
                return true;
            }
        }

        return false;
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
        return json_decode(json_encode($object), true);
    }
}


if (!function_exists('to_object')) {
    /**
     * Converts an array to an object.
     *
     * @param array $array
     * @return object
     */
    function to_object(array $array)
    {
        return json_decode(json_encode($array), false);
    }
}








