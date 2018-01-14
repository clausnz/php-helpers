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
     * #### [( jump back )](#available-php-functions)
     * ```php
     * is_assoc( array $array ): boolean
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
     * #### [( jump back )](#available-php-functions)
     * ```php
     * to_object( array $array ): object
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
     * Converts an object to an array.
     *
     * ### to_array
     * Related global function (description see above).
     * #### [( jump back )](#available-php-functions)
     * ```php
     * to_array( object $object ): array
     * ```
     *
     * @param object $object
     * The object to be converted.
     * @return array
     * An array representation of the converted object.
     */
    public static function toArray($object)
    {
        return json_decode(json_encode($object), true);
    }

    /**
     * Returns the first element of an array.
     *
     * ### array_first
     * Related global function (description see above).
     * #### [( jump back )](#available-php-functions)
     * ```php
     * array_first( array $array ): mixed
     * ```
     *
     * @param array $array
     * The concerned array.
     * @return mixed
     * The value of the first element. Type could be anything.
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
     * #### [( jump back )](#available-php-functions)
     * ```php
     * array_last( array $array ): mixed
     * ```
     *
     * @param array $array
     * The concerned array.
     * @return mixed
     * The value of the last element. Type could be anything.
     */
    public static function last($array)
    {
        return $array[array_keys($array)[sizeof($array) - 1]];
    }


}
