<?php
/**
 * Helper class that provides easy access to useful php user functions.
 *
 * @author      Claus Bayer <claus.bayer@gmail.com>
 * @link        https://github.com/clausnz/php-helpers
 * @license     MIT
 *
 * CREDITS:
 * This class makes use of the following brilliant libraries:
 *
 * serbanghita/Mobile-Detect:
 * - http://mobiledetect.net/
 * - https://github.com/serbanghita/Mobile-Detect
 *
 * JayBizzle/Crawler-Detect:
 * - http://crawlerdetect.io
 * - https://github.com/JayBizzle/Crawler-Detect
 */

namespace CNZ\Helpers;

use Jaybizzle\CrawlerDetect\CrawlerDetect;
use Mobile_Detect;

/**
 * Helper class that provides easy access to useful php functions in conjunction with the user agent.
 *
 * Class Dev
 *
 * @package CNZ\Helpers
 */
class Dev
{
    /**
     * Holds the Crawler-Detect singleton object.
     *
     * @var $crawlerDetectInstance
     */
    private static $crawlerDetectInstance;

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
     * Related global function (description see above).
     * #### [( jump back )](#available-php-functions)
     * ```php
     * is_smartphone( string $userAgent = null ): boolean
     * ```
     *
     * @param string $userAgent
     * The Dev Agent to be analyzed. By default, the value of HTTP Dev-Agent header is used.
     * @return bool
     * True if current visitor uses a smartphone, false otherwise.
     */
    public static function isSmartphone($userAgent = null)
    {
        return (self::isMobile($userAgent) && !self::isTablet($userAgent));
    }

    /**
     * Detects if the current user agent is running on a mobile device (Smartphone/Tablet/Handheld).
     *
     * ### is_mobile
     * Related global function (description see above).
     * #### [( jump back )](#available-php-functions)
     * ```php
     * is_mobile( string $userAgent = null ): boolean
     * ```
     *
     * @param string $userAgent
     * The Dev Agent to be analyzed. By default, the value of HTTP Dev-Agent header is used.
     * @return bool
     * True if current visitor uses a mobile device, false otherwise.
     */
    public static function isMobile($userAgent = null)
    {
        return self::mobileDetect()->isMobile($userAgent) !== false;
    }


    /**
     * Get a singleton Mobile_Detect object to call every method it provides.
     * Public access for use of outside this class.
     * Mobile_Detect doku: https://github.com/serbanghita/Mobile-Detect
     *
     * ***This method has no related global function!***
     * #### [( jump back )](#available-php-functions)
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
     * Related global function (description see above).
     * #### [( jump back )](#available-php-functions)
     * ```php
     * is_tablet( string $userAgent = null ): boolean
     * ```
     *
     * @param string $userAgent
     * The Dev Agent to be analyzed. By default, the value of HTTP Dev-Agent header is used.
     * @return bool
     * True if current visitor uses a tablet device, false otherwise.
     */
    public static function isTablet($userAgent = null)
    {
        return self::mobileDetect()->isTablet($userAgent) !== false;
    }

    /**
     * Determes if the current user agent is a desktop computer.
     *
     * ### is_desktop
     * Related global function (description see above).
     * #### [( jump back )](#available-php-functions)
     * ```php
     * is_desktop( string $userAgent = null ): boolean
     * ```
     *
     * @param string $userAgent
     * The Dev Agent to be analyzed. By default, the value of HTTP Dev-Agent header is used.
     * @return bool
     * True if current visitor uses a desktop computer, false otherwise.
     */
    public static function isDesktop($userAgent = null)
    {
        return (!self::isMobile($userAgent) && !self::isTablet($userAgent) && !self::isRobot($userAgent));
    }

    /**
     * Determes if the current visitor is a bot/crawler/spider.
     *
     * ### is_robot
     * Related global function (description see above).
     * #### [( jump back )](#available-php-functions)
     * ```php
     * is_robot( string $userAgent = null ): boolean
     * ```
     *
     * @param string $userAgent
     *
     * @return boolean
     */
    public static function isRobot($userAgent = null)
    {
        return self::crawlerDetect()->isCrawler($userAgent);
    }

    /**
     * Get a singleton CrawlerDetect object to call every method it provides.
     * Public access for use of outside this class.
     * Crawler-Detect doku: https://github.com/JayBizzle/Crawler-Detect
     *
     * ***This method has no related global function!***
     * #### [( jump back )](#available-php-functions)
     *
     * @return CrawlerDetect
     */
    public static function crawlerDetect()
    {
        if (self::$crawlerDetectInstance == null) {
            self::$crawlerDetectInstance = new CrawlerDetect();
        }

        return self::$crawlerDetectInstance;
    }

    /**
     * Determes if the current user agent is running on an Android device.
     *
     * ### is_android
     * Related global function (description see above).
     * #### [( jump back )](#available-php-functions)
     * ```php
     * is_android( string $userAgent = null ): boolean
     * ```
     *
     * @param string $userAgent
     * The Dev Agent to be analyzed. By default, the value of HTTP Dev-Agent header is used.
     * @return bool
     * True if current visitor uses an Android based device, false otherwise.
     */
    public static function isAndroid($userAgent = null)
    {
        $tmpUserAgent = null;

        if ($userAgent !== null) {
            $tmpUserAgent = self::mobileDetect()->getUserAgent();
            self::mobileDetect()->setUserAgent($userAgent);
        }

        $version = self::mobileDetect()->version('Android');

        if (isset($tmpUserAgent)) {
            self::mobileDetect()->setUserAgent($tmpUserAgent);
        }

        return ($version !== false);
    }

    /**
     * Determes if the current user agent is running on an iPhone device.
     *
     * ### is_iphone
     * Related global function (description see above).
     * #### [( jump back )](#available-php-functions)
     * ```php
     * is_iphone( string $userAgent = null ): boolean
     * ```
     *
     * @param string $userAgent
     * The Dev Agent to be analyzed. By default, the value of HTTP Dev-Agent header is used.
     * @return bool
     * True if current visitor uses an iPhone, false otherwise.
     */
    public static function isIphone($userAgent = null)
    {
        return self::mobileDetect()->is('iPhone', $userAgent) !== false;
    }

    /**
     * Determes if the current user agent is running on a Samsung device.
     *
     * ### is_samsung
     * Related global function (description see above).
     * #### [( jump back )](#available-php-functions)
     * ```php
     * is_samsung( string $userAgent = null ): boolean
     * ```
     *
     * @param string $userAgent
     * The Dev Agent to be analyzed. By default, the value of HTTP Dev-Agent header is used.
     * @return bool
     * True if current visitor uses a Samsung device, false otherwise.
     */
    public static function isSamsung($userAgent = null)
    {
        return self::mobileDetect()->is('Samsung', $userAgent) !== false;
    }

    /**
     * Determes if the current user agent is running on an iOS operating system.
     *
     * ### is_ios
     * Related global function (description see above).
     * #### [( jump back )](#available-php-functions)
     * ```php
     * is_ios( string $userAgent = null ): boolean
     * ```
     *
     * @param string $userAgent
     * The Dev Agent to be analyzed. By default, the value of HTTP Dev-Agent header is used.
     * @return bool
     * True if current visitor uses an iOS device, false otherwise.
     */
    public static function isIOS($userAgent = null)
    {
        return self::mobileDetect()->is('iOS', $userAgent) !== false;
    }
}