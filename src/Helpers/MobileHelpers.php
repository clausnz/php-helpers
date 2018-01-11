<?php
/**
 * Helper class that provides easy access to useful php functions in conjunction with mobile devices.
 *
 * @author      Claus Bayer <claus.bayer@gmail.com>
 * @version     1.0
 * @link        https://github.com/clausnz/php-helpers
 * @license     MIT
 *
 * CREDITS:
 * This class makes use of the well known Mobile_Detect library of serbanghita:
 * - http://mobiledetect.net/
 * - https://github.com/serbanghita/Mobile-Detect
 *
 */

namespace CNZ\Helpers;

use Mobile_Detect;

class MobileHelpers
{
    /**
     * Holds the Mobile_Detect singleton object
     *
     * @var $mobileDetectInstance
     */
    private static $mobileDetectInstance;

    /**
     * Determes if the current user agent is running on a smartphone.
     *
     * @param null $userAgent
     * @return bool
     */
    public static function isSmartphone($userAgent = null)
    {
        return self::isMobile($userAgent) && !self::isTablet($userAgent);
    }

    /**
     * Detects if the current user agent is running on a mobile device.
     *
     * @param string $userAgent
     * @return bool
     */
    public static function isMobile($userAgent = null)
    {
        return self::mobileDetect()->isMobile($userAgent);
    }


    /**
     * Get a singleton Mobile_Detect object to call every method it provides.
     * Public access for use of outside this class.
     * Mobile_Detect doku: https://github.com/serbanghita/Mobile-Detect
     *
     * @return Mobile_Detect
     */
    public static function mobileDetect()
    {
        if (self::$mobileDetectInstance == null) {
            self::$mobileDetectInstance = new Mobile_Detect();
        }

        return self::$mobileDetectInstance;
    }

    /**
     * Determes if the current user agent is a tablet device.
     *
     * @param string $userAgent
     * @return bool
     */
    public static function isTablet($userAgent = null)
    {
        return self::mobileDetect()->isTablet($userAgent);
    }

    /**
     * Determes if the current user agent is a desktop computer.
     *
     * @param string $userAgent
     * @return bool
     */
    public static function isDesktop($userAgent = null)
    {
        return !self::isMobile($userAgent) && !self::isTablet($userAgent);
    }

    /**
     * Determes if the current user agent is running on an Android device.
     *
     * @param string $userAgent
     * @return bool
     */
    public static function isAndroid($userAgent = null)
    {
        $userAgentSet = false;

        if ($userAgent !== null) {
            self::mobileDetect()->setUserAgent($userAgent);
            $userAgentSet = true;
        }

        $version = self::mobileDetect()->version('Android');

        if ($userAgentSet) {
            self::mobileDetect()->setUserAgent($_SERVER['HTTP_USER_AGENT']);
        }

        return isset($version);
    }

    /**
     * Determes if the current user agent is running on an iPhone device.
     *
     * @param string $userAgent
     * @return bool
     */
    public static function isIphone($userAgent = null)
    {
        return self::mobileDetect()->is('iPhone', $userAgent);
    }

    /**
     * Determes if the current user agent is running on a Samsung device.
     *
     * @param null $userAgent
     * @return bool|int|null
     */
    public static function isSamsung($userAgent = null)
    {
        return self::mobileDetect()->is('Samsung', $userAgent);
    }

    /**
     * Determes if the current user agent is running on an iOS operating system.
     *
     * @param null $userAgent
     * @return bool|int|null
     */
    public static function isIOS($userAgent = null)
    {
        return self::mobileDetect()->is('iOS', $userAgent);
    }

    /**
     * Determes if the current user agent is running on a mobile touch device.
     *
     * @param null $userAgent
     * @return bool
     */
    public static function isTouchDevice($userAgent = null)
    {
        return (self::isMobile($userAgent) || self::isTablet($userAgent));
    }
}
