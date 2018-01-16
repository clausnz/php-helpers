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
     * echo is_assoc( $array ) ? 'true' : 'false';
     *
     * // true
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
     * to_object( array $array ): object
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
     * @return object
     * A std object representation of the converted array.
     */
    public static function toObject($array)
    {
        return json_decode(json_encode($array), false);
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
     * to_array( object $object ): array
     * ```
     *
     * #### Example
     * ```php
     * $var = 'php';
     * dump( $var );
     *
     * // (
     *      [0] => p
     *      [1] => h
     *      [2] => p
     * )
     *
     * $var = new stdClass;
     * $var->foo = 'bar';
     * dump( $var );
     *
     * // (
     *      [foo] => bar
     * )
     * ```
     *
     * @param $var
     * Array or string.
     * @return mixed
     * An array representation of the converted string or object.
     * Returns null if $var is no a string or array.
     */
    public static function toArray($var)
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
     * dump( array_first( $array ) )
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
     * dump( array_last( $array ) )
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


}
