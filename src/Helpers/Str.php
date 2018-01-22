<?php
/**
 * Helper class that provides easy access to useful php string functions.
 *
 * @author      Claus Bayer <claus.bayer@gmail.com>
 * @link        https://github.com/clausnz/php-helpers
 * @license     MIT
 *
 */

namespace CNZ\Helpers;

/**
 * Helper class that provides easy access to useful php string functions.
 *
 * Class Str
 * @package CNZ\Helpers
 */
class Str
{
    /**
     * Inserts one or more strings into another string on a defined position.
     *
     * ### str_insert
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * str_insert( array $keyValue, string $string ): string
     * ```
     *
     * #### Example
     * ```php
     * $keyValue = [
     *      ':color' => 'brown',
     *      ':animal' => 'dog'
     * ]
     * $string = 'The quick :color fox jumps over the lazy :animal.';
     *
     * str_insert( $keyValue, $string );
     *
     * // The quick brown fox jumps over the lazy dog.
     * ```
     *
     * @param array  $keyValue
     * An associative array with key => value pairs.
     * @param string $string
     * The text with the strings to be replaced.
     * @return string
     * The replaced string.
     */
    public static function insert($keyValue, $string)
    {
        if (is_assoc($keyValue)) {
            foreach ($keyValue as $search => $replace) {
                $string = str_replace($search, $replace, $string);
            }
        }

        return $string;
    }

    /**
     * Return the content in a string between a left and right element.
     *
     * ### str_between
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * str_between( string $left, string $right, string $string ): array
     * ```
     *
     * #### Example
     * ```php
     * $string = '<tag>foo</tag>foobar<tag>bar</tag>'
     *
     * str_between( '<tag>', '</tag>' $string );
     *
     * // (
     * //     [0] => foo
     * //     [1] => bar
     * // )
     * ```
     *
     *
     * @param string $left
     * The left element of the string to search.
     * @param string $right
     * The right element of the string to search.
     * @param string $string
     * The string to search in.
     * @return array
     * A result array with all matches of the search.
     */
    public static function between($left, $right, $string)
    {
        preg_match_all('/' . preg_quote($left, '/') . '(.*?)' . preg_quote($right, '/') . '/s', $string, $matches);
        return array_map('trim', $matches[1]);
    }

    /**
     * Return the part of a string after a given value.
     *
     * ### str_after
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * str_after( string $search, string $string ): string
     * ```
     *
     * #### Example
     * ```php
     * $string = 'The quick brown fox jumps over the lazy dog';
     *
     * str_after( 'fox' $string );
     *
     * // jumps over the lazy dog
     * ```
     *
     * @param string $search
     * The string to search for.
     * @param string $string
     * The string to search in.
     * @return string
     * The found string after the search string. Whitespaces at beginning will be removed.
     */
    public static function after($search, $string)
    {
        return $search === '' ? $string : ltrim(array_reverse(explode($search, $string, 2))[0]);
    }

    /**
     * Get the part of a string before a given value.
     *
     * ### str_before
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * str_before( string $search, string $string ): string
     * ```
     *
     * #### Example
     * ```php
     * $string = 'The quick brown fox jumps over the lazy dog';
     *
     * str_before( 'fox' $string );
     *
     * // The quick brown
     * ```
     *
     * @param string $search
     * The string to search for.
     * @param string $string
     * The string to search in.
     * @return string
     * The found string before the search string. Whitespaces at end will be removed.
     */
    public static function before($search, $string)
    {
        return $search === '' ? $string : rtrim(explode($search, $string)[0]);
    }

    /**
     * Limit the number of words in a string. Put value of $end to the string end.
     *
     * ### str_limit_words
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * str_limit_words( string $string, int $limit = 10, string $end = '...' ): string
     * ```
     *
     * #### Example
     * ```php
     * $string = 'The quick brown fox jumps over the lazy dog';
     *
     * str_limit_words( $string, 3 );
     *
     * // The quick brown...
     * ```
     *
     * @param  string $string
     * The string to limit the words.
     * @param  int    $limit
     * The number of words to limit. Defaults to 10.
     * @param  string $end
     * The string to end the cut string. Defaults to '...'
     * @return string
     * The limited string with $end at the end.
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
     * ### str_limit
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * str_limit( string $string, int $limit = 100, string $end = '...' ): string
     * ```
     *
     * #### Example
     * ```php
     * $string = 'The quick brown fox jumps over the lazy dog';
     *
     * str_limit( $string, 15 );
     *
     * // The quick brown...
     * ```
     *
     * @param  string $string
     * The string to limit the characters.
     * @param  int    $limit
     * The number of characters to limit. Defaults to 100.
     * @param  string $end
     * The string to end the cut string. Defaults to '...'
     * @return string
     * The limited string with $end at the end.
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
     * ### str_contains
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * str_contains( string|array $needle, string $haystack ): boolean
     * ```
     *
     * #### Example
     * ```php
     * $string = 'The quick brown fox jumps over the lazy dog';
     * $array = [
     *      'cat',
     *      'fox'
     * ];
     *
     * str_contains( $array, $string );
     *
     * // bool(true)
     * ```
     *
     * @param string|array $needle
     * A string or an array of strings.
     * @param string       $haystack
     * The string to search in.
     * @return bool
     * True if $needle is found, false otherwise.
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
     * ### str_icontains
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * str_icontains( string|array $needle, string $haystack ): boolean
     * ```
     *
     * #### Example
     * ```php
     * $string = 'The quick brown fox jumps over the lazy dog';
     * $array = [
     *      'Cat',
     *      'Fox'
     * ];
     *
     * str_icontains( $array, $string );
     *
     * // bool(true)
     * ```
     *
     * @param string|array $needle
     * A string or an array of strings.
     * @param string       $haystack
     * The string to search in.
     * @return bool
     * True if $needle is found, false otherwise.
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
     * ### str_starts_with
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * str_starts_with( string|array $needle, string $haystack ): boolean
     * ```
     *
     * #### Example
     * ```php
     * $string = 'The quick brown fox jumps over the lazy dog';
     * $array = [
     *      'Cat',
     *      'The'
     * ];
     *
     * str_starts_with( $array, $string );
     *
     * // bool(true)
     * ```
     *
     * @param string|array $needle
     * The string or array of strings to search for.
     * @param string       $haystack
     * The string to search in.
     * @return bool
     * True if $needle was found, false otherwise.
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
     * ### str_istarts_with
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * str_istarts_with( string|array $needle, string $haystack ): boolean
     * ```
     *
     * #### Example
     * ```php
     * $string = 'The quick brown fox jumps over the lazy dog';
     * $array = [
     *      'cat',
     *      'the'
     * ];
     *
     * str_istarts_with( $array, $string );
     *
     * // bool(true)
     * ```
     *
     * @param string|array $needle
     * The string or array of strings to search for.
     * @param string       $haystack
     * The string to search in.
     * @return bool
     * True if $needle was found, false otherwise.
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
     * ### str_ends_with
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * str_ends_with( string|array $needle, string $haystack ): boolean
     * ```
     *
     * #### Example
     * ```php
     * $string = 'The quick brown fox jumps over the lazy dog';
     * $array = [
     *      'cat',
     *      'dog'
     * ];
     *
     * str_ends_with( $array, $string );
     *
     * // bool(true)
     * ```
     *
     * @param string|array $needle
     * The string or array of strings to search for.
     *
     * @param string       $haystack
     * The string to search in.
     *
     * @return bool
     * True if $needle was found, false otherwise.
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
     * ### str_iends_with
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * str_iends_with( string|array $needle, string $haystack ): boolean
     * ```
     *
     * #### Example
     * ```php
     * $string = 'The quick brown fox jumps over the lazy dog';
     * $array = [
     *      'Cat',
     *      'Dog'
     * ];
     *
     * str_iends_with( $array, $string );
     *
     * // bool(true)
     * ```
     *
     * @param string|array $needle
     * The string or array of strings to search for.
     * @param string       $haystack
     * The string to search in.
     * @return bool
     * True if $needle was found, false otherwise.
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

    /**
     * Return the part of a string after the last occurrence of a given search value.
     *
     * ### str_after_last
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * str_after_last( string $search, string $string ): string
     * ```
     *
     * #### Example
     * ```php
     * $path = "/var/www/html/public/img/image.jpg";
     *
     * str_after_last( '/' $path );
     *
     * // image.jpg
     * ```
     *
     * @param string $search
     * The string to search for.
     * @param string $string
     * The string to search in.
     * @return string
     * The found string after the last occurrence of the search string. Whitespaces at beginning will be removed.
     */
    public static function afterLast($search, $string)
    {
        return $search === '' ? $string : ltrim(array_reverse(explode($search, $string))[0]);
    }
}