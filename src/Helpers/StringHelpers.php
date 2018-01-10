<?php

namespace CNZ\Helpers;

class StringHelpers
{
    /**
     * Return the remainder of a string after a given value.
     *
     * @param string $search
     * @param string $string
     * @return string
     */
    public static function after($search, $string)
    {
        return $search === '' ? $string : ltrim(array_reverse(explode($search, $string, 2))[0]);
    }

    /**
     * Get the portion of a string before a given value.
     *
     * @param string $string
     * @param string $search
     * @return string
     */
    public static function before($search, $string)
    {
        return $search === '' ? $string : rtrim(explode($search, $string)[0]);
    }

    /**
     * Limit the number of words in a string. Put value of $end to the string end.
     *
     * @param  string $string
     * @param  int $limit
     * @param  string $end
     * @return string
     */
    public static function limitWords($string, $limit = 10, $end = '...')
    {
        $arrayWords = explode(' ', $string);

        if (sizeof($arrayWords) <= $limit) {
            return $string;
        }

        return implode(' ', array_slice($arrayWords, 0, $limit)) . $end;
    }

    /**
     * Limit the number of characters in a string. Put value of $end to the string end.
     *
     * @param  string $string
     * @param  int $limit
     * @param  string $end
     * @return string
     */
    public static function limit($string, $limit = 100, $end = '...')
    {
        if (mb_strwidth($string, 'UTF-8') <= $limit) {
            return $string;
        }

        return rtrim(mb_strimwidth($string, 0, $limit, '', 'UTF-8')) . $end;
    }

    /**
     * Tests if a string contains a given element
     *
     * @param string|array $needle
     * @param string $haystack
     * @return bool
     */
    public static function contains($needle, $haystack)
    {
        foreach ((array)$needle as $ndl) {
            if (strpos($haystack, $ndl) !== false) {
                return true;
            }
        }

        return false;
    }

    /**
     * Tests if a string contains a given element. Ignore case sensitivity.
     *
     * @param string|array $needle
     * @param string $haystack
     * @return bool
     */
    public static function containsIgnoreCase($needle, $haystack)
    {
        foreach ((array)$needle as $ndl) {
            if (stripos($haystack, $ndl) !== false) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine if a given string starts with a given substring.
     *
     * @param string|array $needle
     * @param string $haystack
     * @return bool
     */
    public static function startsWith($needle, $haystack)
    {
        foreach ((array)$needle as $ndl) {
            if ($ndl !== '' && substr($haystack, 0, strlen($ndl)) === (string)$ndl) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine if a given string starts with a given substring. Ignore case sensitivity.
     *
     * @param string|array $needle
     * @param string $haystack
     * @return bool
     */
    public static function startsWithIgnoreCase($needle, $haystack)
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

    /**
     * Determine if a given string ends with a given substring.
     *
     * @param string|array $needle
     * @param string $haystack
     * @return bool
     */
    public static function endsWith($needle, $haystack)
    {
        foreach ((array)$needle as $ndl) {
            $length = strlen($ndl);
            if ($length === 0 || (substr($haystack, -$length) === (string)$ndl)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine if a given string ends with a given substring.
     *
     * @param string|array $needle
     * @param string $haystack
     * @return bool
     */
    public static function endsWithIgnoreCase($needle, $haystack)
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