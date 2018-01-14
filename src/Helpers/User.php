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
 * Class User
 * @package CNZ\Helpers
 */
class User
{
    const LOCALHOST = '127.0.0.1';

    /**
     * Validate a given email address.
     *
     * ### is_email
     * Related global function (description see above).
     * #### [( jump back )](#available-php-functions)
     * ```php
     * is_email( string $email ): boolean
     * ```
     *
     * @param string $email
     * @return boolean
     */
    public static function is_email($email)
    {
        return (filter_var($email, FILTER_VALIDATE_EMAIL) !== false) ? true : false;
    }

    /**
     * Get the current ip address of the user.
     *
     * ### user_ip
     * Related global function (description see above).
     * #### [( jump back )](#available-php-functions)
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