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
     * Validates if a given file contains yaml syntax.
     *
     * ### is_yml_file
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * is_yml_file( string $file ): boolean
     * ```
     *
     * #### Example
     * ```php
     * $file = /path/to/file.yml
     *
     * is_yml_file( $file );
     *
     * // bool(true)
     * ```
     *
     * @param string $file
     * The file to test for yaml syntax.
     * @return bool
     * True if the file contains yaml syntax, false otherwise.
     */
    public static function isValidFile($file)
    {
        if (!is_file($file)) {
            return false;
        }

        return self::isValid(file_get_contents($file));
    }

    /**
     * Tests if the syntax of a given string is yaml.
     *
     * ### is_yml
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * is_yml( string $string ): boolean
     * ```
     *
     * #### Example
     * ```php
     * $string = "
     *      foo: bar
     *      baz: qux
     *      foobar:
     *          foo: bar
     * ";
     *
     * is_yml( $string );
     *
     * // bool(true)
     * ```
     *
     * @param string $string
     * The string to test for yaml syntax.
     * @return bool
     * True if the string is yaml, false otherwise.
     */
    public static function isValid($string)
    {
        if (is_string($string)) {
            return is_assoc(self::parse($string));
        }

        return false;
    }

    /**
     * Transforms a given yaml string into an array.
     *
     * ### yml_parse
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * yml_parse( string $yml ): array|null
     * ```
     *
     * #### Example
     * ```php
     * $yml = "
     *      foo: bar
     *      baz: qux
     *      foobar:
     *          foo: bar
     * ";
     *
     * yml_parse( $yml );
     *
     * // (
     * //       [foo] => bar
     * //       [baz] => qux
     * //       [foobar] => (
     * //           [foo] => bar
     * //       )
     * // )
     * ```
     *
     * @param string $yml
     * The yaml string to parse.
     * @return array|null
     * The transformed array, null on error.
     */
    public static function parse($yml)
    {
        if (!is_string($yml)) {
            return null;
        }

        try {
            $result = self::spyc()->load($yml);
            return is_assoc($result) ? $result : null;
        } catch (\Exception $e) {
            return null;
        }
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
     * Gets a value in a yaml string using the dot notation.
     *
     * ### yml_get
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * yml_get( string $key, string $yml ): mixed
     * ```
     *
     * #### Example
     * ```php
     * $yml = "
     *      foo: bar
     *      baz: qux
     *      foobar:
     *          foo: bar
     * ";
     *
     * yml_get( 'foobar.foo', $yml );
     *
     * // bar
     * ```
     *
     * @param string $key
     * The key to search using dot notation (e.g. 'foo.bar.baz').
     * @param string $yml
     * The yml string to search in.
     * @return mixed
     * The found value, null otherwise.
     */
    public static function get($key, $yml)
    {
        return arr::get($key, self::parse($yml));
    }

    /**
     * Gets a value in a yaml file using the dot notation.
     *
     * ### yml_get_file
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * yml_get_file( string $key, string $ymlfile ): mixed
     * ```
     *
     * #### Example
     * ```php
     * $ymlfile = '/path/to/file.yml';
     *
     * yml_get_file( 'foobar.foo', $ymlfile );
     *
     * // bar
     * ```
     *
     * @param string $key
     * The key to search using dot notation (e.g. 'foo.bar.baz').
     * @param string $ymlfile
     * The ymlfile to search in.
     * @return mixed
     * The found value, null otherwise.
     */
    public static function getFile($key, $ymlfile)
    {
        return arr::get($key, self::parseFile($ymlfile));
    }

    /**
     * Loads the content of a yamlfile into an array.
     *
     * ### yml_parse_file
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * yml_parse_file( string $ymlfile ): array|null
     * ```
     *
     * #### Example
     * ```php
     * $ymlfile = '/path/to/file.yml';
     *
     * yml_parse_file( $ymlfile );
     *
     * // (
     * //       [foo] => bar
     * //       [baz] => qux
     * //       [foobar] => (
     * //           [foo] => bar
     * //       )
     * // )
     * ```
     *
     * @param string $ymlfile
     * The path of the file to read from.
     * @return array
     * The parsed array.
     */
    public static function parseFile($ymlfile)
    {
        if (!is_file($ymlfile)) {
            return null;
        }

        return self::parse(file_get_contents($ymlfile));
    }

    /**
     * Sets a value in a yamlfile using the dot notation. Note: all comments in the file will be removed!
     *
     * ### yml_set_file
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * yml_set_file( string $key, mixed $value, string $ymlfile ): boolean
     * ```
     *
     * #### Example
     * ```php
     * $ymlfile = '/path/to/file.yml';
     *
     * yml_set_file( 'foobar.foo', 'baz', $ymlfile );
     *
     * //   foo: bar
     * //   baz: qux
     * //   foobar:
     * //       foo: baz
     * ```
     *
     * @param string $key
     * The string to search with dot notation
     * @param mixed  $value
     * The value to set on the specified key.
     * @param string $ymlfile
     * The ymlfile to set the value in.
     * @return bool
     * True if value was successfully set in yamlfile, false otherwise.
     */
    public static function setFile($key, $value, $ymlfile)
    {
        // create empty array
        $ymlArray = [];

        // if file exists, a filled array is given
        if (file_exists($ymlfile)) {
            $ymlArray = self::parseFile($ymlfile);
        }

        // fill array with content
        $value = arr::set($key, $value, $ymlArray);

        // write back to ymlfile
        if ($value) {
            self::dumpFile($ymlArray, $ymlfile);
        }

        return $value;
    }

    /**
     * Transformes a given array to yaml syntax and puts its content into a given file. Note: if the file exists, it will be overwritten!
     *
     * ### to_yml_file
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * to_yml_file( array|object $var, string $filename, int $indent = 2, int $wordwrap = 0, bool $openingDashes = false ): boolean
     * ```
     *
     * #### Example
     * ```php
     * $array = [
     *      'foo' => 'bar',
     *      'baz' => 'qux'
     * ];
     *
     * to_yml_file( $array, '/path/to/file.yml' );
     *
     * //   foo: bar
     * //   baz: qux
     * ```
     *
     * @param     array|object $var
     * The array or object to transform.
     * @param     string       $filename
     * The path to the file to write the yaml string into. Note: if the file already exists, it will be overwritten!
     * @param       int        $indent
     * The indent of the converted yaml. Defaults to 2.
     * @param int              $wordwrap
     * After the given number a string will be wraped. Default to 0 (no wordwrap).
     * @param bool             $openingDashes
     * True if the yaml string should start with opening dashes. Defaults to false.
     * @return bool
     * True on success, false otherwise.
     */
    public static function dumpFile($var, $filename, $indent = 2, $wordwrap = 0, $openingDashes = false)
    {
        $value = file_put_contents($filename, self::dump($var, $indent, $wordwrap, $openingDashes));
        return $value === 0 ? false : $value;
    }

    /**
     * Transformes a given array or object to a yaml string.
     *
     * ### to_yml
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * to_yml( array|object $array, string $filename, int $indent = 2, int $wordwrap = 0, bool $openingDashes = false ): string|null
     * ```
     *
     * #### Example
     * ```php
     * $array = [
     *      'foo' => 'bar',
     *      'baz' => 'qux',
     *      'foobar' => [
     *          'foo' => 'bar'
     *      ]
     * ];
     *
     * to_yml( $array );
     *
     * //   foo: bar
     * //   baz: qux
     * //   foobar:
     * //     foo: bar
     * ```
     *
     * @param array|object $var
     * The array or object to transform.
     * @param int          $indent
     * The indent of the converted yaml. Defaults to 2.
     * @param int          $wordwrap
     * After the given number a string will be wraped. Default to 0 (no wordwrap).
     * @param bool         $openingDashes
     * True if the yaml string should start with opening dashes. Defaults to false.
     * @return string|null
     * The converted yaml string. On errors, null is returned.
     */
    public static function dump($var, $indent = 2, $wordwrap = 0, $openingDashes = false)
    {
        if (is_object($var)) {
            $var = arr::dump($var);
        }

        if (!is_array($var) || !is_int($wordwrap) || !is_bool($openingDashes)) {
            return null;
        }

        // clean parameters for ext. library
        $openingDashes ? $noOpeningDashes = false : $noOpeningDashes = true;

        return self::spyc()->YAMLDump($var, $indent, $wordwrap, $noOpeningDashes);
    }

    /**
     * Sets a value in a yaml string using the dot notation.
     *
     * ### yml_set
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * yml_set( string $key, mixed $value, string &$yml ): boolean
     * ```
     *
     * #### Example
     * ```php
     * $yml = "
     *      foo: bar
     *      baz: qux
     *      foobar:
     *          foo: bar
     * ";
     *
     * yml_set( 'foobar.foo', 'baz', $yml );
     *
     * //   foo: bar
     * //   baz: qux
     * //   foobar:
     * //       foo: baz
     * ```
     *
     * @param string $key
     * The string to search with dot notation
     * @param mixed  $value
     * The value to set on the specified key.
     * @param string $yml
     * The yml string to search in. Note: all comments in the string will be removed!
     * @return bool
     * True if value was successfully set, false otherwise.
     */
    public static function set($key, $value, &$yml)
    {
        if (is_string($key) && (is_string($value) || is_array($value))) {
            $array = yml::parse($yml);
            $value = arr::set($key, $value, $array);
            $yml = yml::dump($array);

            return $value;
        }

        return false;
    }
}