<?php

namespace CNZ\Helpers;


class ArrayHelpers
{
    /**
     * Detects if the given value is an associative array.
     *
     * @param array $array
     * @return bool
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
     * @param array $array
     * @return object
     */
    public static function toObject($array)
    {
        return json_decode(json_encode($array), false);
    }

    /**
     * Converts an object to an array.
     *
     * @param $object
     * @return array
     */
    public static function fromObject($object)
    {
        return json_decode(json_encode($object), true);
    }

    /**
     * Returns the first element of an array.
     *
     * @param array $array
     * @return mixed $value
     */
    public static function first($array)
    {
        return $array[array_keys($array)[0]];
    }

    /**
     * Returns the last element of an array.
     *
     * @param array $array
     * @return mixed $value
     */
    public static function last($array)
    {
        return $array[array_keys($array)[sizeof($array) - 1]];
    }


}
