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

/**
 * Helper class that provides easy access to useful php functions in conjunction with mobile devices.
 *
 * Class MobileHelpers
 * @package CNZ\Helpers
 */
class MobileHelpers
{
    /**
     * Holds the Mobile_Detect singleton object.
     *
     * @var $mobileDetectInstance
     */
    private static $mobileDetectInstance;

    /**
     * Determes if the current user agent is running on a smartphone.
     *
     * ### is_smartphone
     * Related global function.
     * ```php
     * is_smartphone( string $userAgent = null ): boolean
     * ```
     *
     * @param string $userAgent
     * If $userAgent is not set, $_SERVER ['HTTP_USER_AGENT'] will be used.
     * @return bool
     * True if current visitor uses a smartphone, false otherwise.
     */
    public static function isSmartphone($userAgent = null)
    {
        return (self::isMobile($userAgent) && !self::isTablet($userAgent));
    }

    /**
     * Detects if the current user agent is running on a mobile device.
     *
     * ### is_mobile
     * Related global function.
     * ```php
     * is_mobile( string $userAgent = null ): boolean
     * ```
     *
     * @param string $userAgent
     * If $userAgent is not set, $_SERVER ['HTTP_USER_AGENT'] will be used.
     * @return bool
     * True if current visitor uses a mobile device, false otherwise.
     */
    public static function isMobile($userAgent = null)
    {
        return self::mobileDetect()->isMobile($userAgent) ? true : false;
    }


    /**
     * Get a singleton Mobile_Detect object to call every method it provides.
     * Public access for use of outside this class.
     * Mobile_Detect doku: https://github.com/serbanghita/Mobile-Detect
     *
     * ***This method has no related global function!***
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
     * ### is_tablet
     * Related global function.
     * ```php
     * is_tablet( string $userAgent = null ): boolean
     * ```
     *
     * @param string $userAgent
     * If $userAgent is not set, $_SERVER ['HTTP_USER_AGENT'] will be used.
     * @return bool
     * True if current visitor uses a tablet device, false otherwise.
     */
    public static function isTablet($userAgent = null)
    {
        return self::mobileDetect()->isTablet($userAgent) ? true : false;
    }

    /**
     * Determes if the current user agent is a desktop computer.
     *
     * ### is_desktop
     * Related global function.
     * ```php
     * is_desktop( string $userAgent = null ): boolean
     * ```
     *
     * @param string $userAgent
     * If $userAgent is not set, $_SERVER ['HTTP_USER_AGENT'] will be used.
     * @return bool
     * True if current visitor uses a desktop computer, false otherwise.
     */
    public static function isDesktop($userAgent = null)
    {
        return (!self::isMobile($userAgent) && !self::isTablet($userAgent));
    }

    /**
     * Determes if the current user agent is running on an Android device.
     *
     * ### is_android
     * Related global function.
     * ```php
     * is_android( string $userAgent = null ): boolean
     * ```
     *
     * @param string $userAgent
     * If $userAgent is not set, $_SERVER ['HTTP_USER_AGENT'] will be used.
     * @return bool
     * True if current visitor uses an Android based device, false otherwise.
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
     * ### is_iphone
     * Related global function.
     * ```php
     * is_iphone( string $userAgent = null ): boolean
     * ```
     *
     * @param string $userAgent
     * If $userAgent is not set, $_SERVER ['HTTP_USER_AGENT'] will be used.
     * @return bool
     * True if current visitor uses an iPhone, false otherwise.
     */
    public static function isIphone($userAgent = null)
    {
        return self::mobileDetect()->is('iPhone', $userAgent) ? true : false;
    }

    /**
     * Determes if the current user agent is running on a Samsung device.
     *
     * ### is_samsung
     * Related global function.
     * ```php
     * is_samsung( string $userAgent = null ): boolean
     * ```
     *
     * @param string $userAgent
     * If $userAgent is not set, $_SERVER ['HTTP_USER_AGENT'] will be used.
     * @return bool
     * True if current visitor uses a Samsung device, false otherwise.
     */
    public static function isSamsung($userAgent = null)
    {
        return self::mobileDetect()->is('Samsung', $userAgent) ? true : false;
    }

    /**
     * Determes if the current user agent is running on an iOS operating system.
     *
     * ### is_ios
     * Related global function.
     * ```php
     * is_ios( string $userAgent = null ): boolean
     * ```
     *
     * @param string $userAgent
     * If $userAgent is not set, $_SERVER ['HTTP_USER_AGENT'] will be used.
     * @return bool
     * True if current visitor uses an iOS device, false otherwise.
     */
    public static function isIOS($userAgent = null)
    {
        return self::mobileDetect()->is('iOS', $userAgent) ? true : false;
    }

    /**
     * Determes if the current user agent is running on a mobile touch device.
     *
     * ### is_touch_device
     * Related global function.
     * ```php
     * is_touch_device( string $userAgent = null ): boolean
     * ```
     *
     * @param string $userAgent
     * If $userAgent is not set, $_SERVER ['HTTP_USER_AGENT'] will be used.
     * @return bool
     * True if current visitor uses a touch device, false otherwise.
     */
    public static function isTouchDevice($userAgent = null)
    {
        return (self::isMobile($userAgent) || self::isTablet($userAgent));
    }
}
