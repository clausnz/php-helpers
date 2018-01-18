<?php
/**
 * Helper class that provides easy access to useful php yaml functions.
 *
 * @author      Claus Bayer <claus.bayer@gmail.com>
 * @link        https://github.com/clausnz/php-helpers
 * @license     MIT
 *
 * CREDITS:
 * This class makes use of the following brilliant library:
 *
 * mustangostang/spyc:
 * - https://github.com/mustangostang/spyc
 */

namespace CNZ\Helpers;

use CNZ\Helpers\Arr as arr;

/**
 * Helper class that provides easy access to useful php yml functions.
 *
 * Class Yml
 *
 * @package CNZ\Helpers
 */
class Yml
{
    /**
     * Holds the instance of the Spyc object.
     *
     * @var
     */
    private static $spycInstance;

    /**
     * Transformes a given array to yaml syntax and puts its content into a given file.
     *
     * @codeCoverageIgnore
     *
     * @param     array|object $var
     * The array to transform.
     * @param     string       $filename
     * The path to the file to write the yaml string into.
     * @param       int        $indent
     * The indent of the converted yaml. Defaults to 2.
     * @return bool
     * True on success, false otherwise.
     *
     */
    public static function toYmlFile($var, $filename, $indent = 2)
    {
        return file_put_contents($filename, self::toYml($var, $indent));
    }

    /**
     * Transformes a given array to a yaml string.
     *
     * @param array|object $var
     * The array or object to transform.
     * @param int          $indent
     * The indent of the converted yaml. Defaults to 2.
     * @return string|null
     * The converted yaml string. If $var is not an array or object, null is returned.
     */
    public static function toYml($var, $indent = 2)
    {
        if (is_object($var)) {
            $var = arr::toArray($var);
        }

        if (!is_array($var)) {
            return null;
        }

        return self::spyc()->YAMLDump($var, $indent);
    }

    /**
     * Returns a singleton instance of the Spyc Yaml parser.
     *
     * @codeCoverageIgnore
     * @ignore
     *
     * @return \Spyc
     */
    private static function spyc()
    {
        if (self::$spycInstance == null) {
            self::$spycInstance = new \Spyc();
        }

        return self::$spycInstance;
    }

    /**
     * Loads the content of a yaml file into an array.
     *
     * @codeCoverageIgnore
     *
     * @param $ymlFile
     * The path of the file to read from.
     * @return array
     * The parsed array.
     */
    public static function parseYmlFile($ymlFile)
    {
        return self::parseYml(file_get_contents($ymlFile));
    }

    /**
     * Transforms a given yaml string into an array.
     *
     * @param string $yml
     * The yaml string to convert.
     * @return array|null
     * The transformed array, null on error.
     */
    public static function parseYml($yml)
    {
        if (!is_string($yml)) {
            return null;
        }

        $result = self::spyc()->load($yml);
        return is_assoc($result) ? $result : null;
    }

    /**
     * Validates if a given file contains yaml syntax.
     *
     * @codeCoverageIgnore
     *
     * @param string $ymlFile
     * The file to test for yaml syntax.
     * @return bool
     * True if the file contains yaml syntax, false otherwise.
     */
    public static function isYmlFile($ymlFile)
    {
        return self::isYml(file_get_contents($ymlFile));
    }

    /**
     * Tests if the syntax of a given string is yaml.
     *
     * @param string $string
     * The string to test for yaml syntax.
     * @return bool
     * True if the string is yaml, false otherwise.
     */
    public static function isYml($string)
    {
        if (is_string($string)) {
            return is_assoc(self::parseYml($string));
        }

        return false;
    }
}