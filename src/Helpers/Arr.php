<?php
/**
 * Helper class that provides easy access to useful php array functions.
 *
 * @author      Claus Bayer <claus.bayer@gmail.com>
 * @version     1.0
 * @link        https://github.com/clausnz/php-helpers
 * @license     MIT
 *
 */

namespace CNZ\Helpers;

/**
 * Helper class that provides easy access to useful php array functions.
 *
 * Class Arr
 * @package CNZ\Helpers
 */
class Arr
{
    /**
     * Detects if the given value is an associative array.
     *
     * ### is_assoc
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * is_assoc( array $array ): boolean
     * ```
     *
     * #### Example
     * ```php
     * $array = [
     *     'foo' => 'bar'
     * ];
     *
     * is_assoc( $array );
     *
     * // bool(true)
     * ```
     *
     * @param array $array
     * Any type of array.
     * @return bool
     * True if the array is associative, false otherwise.
     */
    public static function isAssoc($array)
    {
        if (!is_array($array) || $array === []) {
            return false;
        }

        return array_keys($array) !== range(0, count($array) - 1);
    }

    /**
     * Converts an array to an object.
     *
     * ### to_object
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * to_object( array $array ): object|null
     * ```
     *
     * #### Example
     * ```php
     * $array = [
     *     'foo' => [
     *          'bar' => 'baz'
     *     ]
     * ];
     *
     * $obj = to_object($array);
     * echo $obj->foo->bar;
     *
     * // baz
     * ```
     *
     * @param array $array
     * The array to be converted.
     * @return object|null
     * A std object representation of the converted array.
     */
    public static function toObject($array)
    {
        $result = json_decode(json_encode($array), false);
        return is_object($result) ? $result : null;
    }

    /**
     * Converts a string or an object to an array.
     *
     * ### to_array
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * to_array( string|object $var ): array|null
     * ```
     *
     * #### Example 1 (string)
     * ```php
     * $var = 'php';
     * to_array( $var );
     *
     * // (
     * //     [0] => p
     * //     [1] => h
     * //     [2] => p
     * // )
     *
     * ```
     * #### Example 2 (object)
     * ```php
     * $var = new stdClass;
     * $var->foo = 'bar';
     *
     * to_array( $var );
     *
     * // (
     * //     [foo] => bar
     * // )
     * ```
     *
     * @param string|object $var
     * String or object.
     * @return array|null
     * An array representation of the converted string or object.
     * Returns null on error.
     */
    public static function dump($var)
    {
        if (is_string($var)) {
            return str_split($var);
        }

        if (is_object($var)) {
            return json_decode(json_encode($var), true);
        }

        return null;
    }

    /**
     * Returns the first element of an array.
     *
     * ### array_first
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * array_first( array $array ): mixed
     * ```
     *
     * #### Example
     * ```php
     * $array = [
     *      'foo' => 'bar',
     *      'baz' => 'qux'
     * ];
     *
     * array_first( $array )
     *
     * // bar
     * ```
     *
     * @param array $array
     * The concerned array.
     * @return mixed
     * The value of the first element, without key. Mixed type.
     *
     */
    public static function first($array)
    {
        return $array[array_keys($array)[0]];
    }

    /**
     * Returns the last element of an array.
     *
     * ### array_last
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * array_last( array $array ): mixed
     * ```
     *
     * #### Example
     * ```php
     * $array = [
     *      'foo' => 'bar',
     *      'baz' => 'qux'
     * ];
     *
     * array_last( $array )
     *
     * // qux
     * ```
     *
     * @param array $array
     * The concerned array.
     * @return mixed
     * The value of the last element, without key. Mixed type.
     */
    public static function last($array)
    {
        return $array[array_keys($array)[sizeof($array) - 1]];
    }

    /**
     * Gets a value in an array by dot notation for the keys.
     *
     * ### array_get
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * array_get( string key, array $array ): mixed
     * ```
     *
     * #### Example
     * ```php
     * $array = [
     *      'foo' => 'bar',
     *      'baz' => [
     *          'qux => 'foobar'
     *      ]
     * ];
     *
     * array_get( 'baz.qux', $array );
     *
     * // foobar
     * ```
     *
     * @param string $key
     * The key by dot notation.
     * @param array  $array
     * The array to search in.
     * @return mixed
     * The searched value, null otherwise.
     */
    public static function get($key, $array)
    {
        if (is_string($key) && is_array($array)) {
            $keys = explode('.', $key);

            while (sizeof($keys) >= 1) {
                $k = array_shift($keys);

                if (!isset($array[$k])) {
                    return null;
                }

                if (sizeof($keys) === 0) {
                    return $array[$k];
                }

                $array = &$array[$k];
            }
        }

        return null;
    }

    /**
     * Sets a value in an array using the dot notation.
     *
     * ### array_set
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * array_set( string key, mixed value, array $array ): boolean
     * ```
     *
     * #### Example 1
     * ```php
     * $array = [
     *      'foo' => 'bar',
     *      'baz' => [
     *          'qux => 'foobar'
     *      ]
     * ];
     *
     * array_set( 'baz.qux', 'bazqux', $array );
     *
     * // (
     * //     [foo] => bar
     * //     [baz] => [
     * //         [qux] => bazqux
     * //     ]
     * // )
     * ```
     *
     * #### Example 2
     * ```php
     * $array = [
     *      'foo' => 'bar',
     *      'baz' => [
     *          'qux => 'foobar'
     *      ]
     * ];
     *
     * array_set( 'baz.foo', 'bar', $array );
     *
     * // (
     * //     [foo] => bar
     * //     [baz] => [
     * //         [qux] => bazqux
     * //         [foo] => bar
     * //     ]
     * // )
     * ```
     *
     * @param string $key
     * The key to set using dot notation.
     * @param mixed  $value
     * The value to set on the specified key.
     * @param array  $array
     * The concerned array.
     * @return bool
     * True if the new value was successfully set, false otherwise.
     */
    public static function set($key, $value, &$array)
    {
        if (is_string($key) && !empty($key)) {

            $keys = explode('.', $key);
            $arrTmp = &$array;

            while (sizeof($keys) >= 1) {
                $k = array_shift($keys);

                if (!is_array($arrTmp)) {
                    $arrTmp = [];
                }

                if (!isset($arrTmp[$k])) {
                    $arrTmp[$k] = [];
                }

                if (sizeof($keys) === 0) {
                    $arrTmp[$k] = $value;
                    return true;
                }

                $arrTmp = &$arrTmp[$k];
            }
        }

        return false;
    }
}
