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
    const LOCALHOST = '127.0.0.1';

    /**
     * Get the current ip address of the user.
     *
     * ### user_ip
     * Related global function.
     * ```php
     * user_ip(  ): null|string
     * ```
     *
     * @param bool $cli
     * @return null|string
     */
    public static function ip($cli = false)
    {
        if (php_sapi_name() == 'cli' && $cli) {
            return self::LOCALHOST;
        }

        return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : null;
    }
}