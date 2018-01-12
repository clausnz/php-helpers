<?php
/**
 * Helper class that provides easy access to useful php user functions.
 *
 * @author      Claus Bayer <claus.bayer@gmail.com>
 * @link        https://github.com/clausnz/php-helpers
 * @license     MIT
 *
 */

namespace CNZ\Helpers;

/**
 * Helper class that provides easy access to useful php user functions.
 *
 * Class UserHelpers
 * @package CNZ\Helpers
 */
class UserHelpers
{
    /**
     * Get the current ip address of the user.
     *
     * ### user_ip
     * Related global function.
     * ```php
     * user_ip(  ): null|string
     * ```
     *
     * @return null|string
     */
    public static function ip()
    {
        if (isset($_SERVER['REMOTE_ADDR'])) {
            return $_SERVER['REMOTE_ADDR'];
        }

        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }

        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        }

        return null;
    }
}