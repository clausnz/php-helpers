<?php
/**
 * Helper class that provides easy access to useful common php functions.
 *
 * @author      Claus Bayer <claus.bayer@gmail.com>
 * @version     1.0
 * @link        https://github.com/clausnz/php-helpers
 * @license     MIT
 *
 */

namespace CNZ\Helpers;

/**
 * Helper class that provides easy access to useful common php functions.
 *
 * Class CommonHelpers
 * @package CNZ\Helpers
 */
class CommonHelpers
{
    /**
     * Dumps the content of the given variable and exits the script.
     *
     * ### dd
     * Related global function.
     * ```php
     * dd( mixed var )
     * ```
     *
     * @param mixed $var
     */
    public static function dd($var)
    {
        static::dump($var);
        die();
    }

    /**
     * Dumps the content of the given variable.
     *
     * ### dump
     * Related global function.
     * ```php
     * dump( mixed var )
     * ```
     *
     * @param mixed $var
     */
    public static function dump($var)
    {
        if (php_sapi_name() == 'cli') {
            print_r($var);
        } else {
            highlight_string("<?php\n" . var_export($var, true));
        }
    }

}