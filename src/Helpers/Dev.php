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

use Detection\MobileDetect;
use Jaybizzle\CrawlerDetect\CrawlerDetect;

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
     * @ognore
     *
     * @var $crawlerDetectInstance
     */
    private static $crawlerDetectInstance;
    /**
     * Holds the Mobile_Detect singleton object.
     *
     * @ignore
     *
     * @var $mobileDetectInstance
     */
    private static $mobileDetectInstance;

    /**
     * Holds the $userAgent variable (for testing).
     *
     * @ignore
     *
     * @var $userAgent
     */
    private static $userAgent;

    /**
     * Determes if the current device is a smartphone.
     *
     * ### is_smartphone
     * Related global function (description see above).
     * > #### [( jump back )](#available-php-functions)
     * ```php
     * is_smartphone(  ): boolean
     * ```
     *
     * @return bool
     * True if current visitor uses a smartphone, false otherwise.
     */
    public static function isSmartphone()
    {
        return (self::isMobile() && !self::isTablet());
    }

    /**
     * Detects if the current visitor uses a mobile device (Smartphone/Tablet/Handheld).
     *
     * ### is_mobile
     * Related global function (description see above).
     * > #### [( jump back )](#available-php-functions)
     * ```php
     * is_mobile(  ): boolean
     * ```
     *
     * @return bool
     * True if current visitor uses a mobile device, false otherwise.
     */
    public static function isMobile()
    {
        return self::mobileDetect()->isMobile() !== false;
    }

    /**
     * Get a singleton MobileDetect object to call every method it provides.
     * Public access for use of outside this class.
     * Mobile_Detect doku: https://github.com/serbanghita/Mobile-Detect
     *
     * ***This method has no related global function!***
     * > #### [( jump back )](#available-php-functions)
     *
     * @return MobileDetect
     */
    public static function mobileDetect()
    {
        if (self::$mobileDetectInstance == null) {
            self::$mobileDetectInstance = new MobileDetect();
        }

        return self::$mobileDetectInstance;
    }

    /**
     * Determes if the current visitor uses a tablet device.
     *
     * ### is_tablet
     * Related global function (description see above).
     * > #### [( jump back )](#available-php-functions)
     * ```php
     * is_tablet(  ): boolean
     * ```
     *
     * @return bool
     * True if current visitor uses a tablet device, false otherwise.
     */
    public static function isTablet()
    {
        return self::mobileDetect()->isTablet() !== false;
    }

    /**
     * Determes if the current visitor uses a desktop computer.
     *
     * ### is_desktop
     * Related global function (description see above).
     * > #### [( jump back )](#available-php-functions)
     * ```php
     * is_desktop(  ): boolean
     * ```
     *
     * @return bool
     * True if current visitor uses a desktop computer, false otherwise.
     */
    public static function isDesktop()
    {
        return (!self::isMobile() && !self::isTablet() && !self::isRobot());
    }

    /**
     * Determes if the current visitor is a bot/crawler/spider.
     *
     * ### is_robot
     * Related global function (description see above).
     * > #### [( jump back )](#available-php-functions)
     * ```php
     * is_robot(  ): boolean
     * ```
     *
     * @return boolean
     */
    public static function isRobot()
    {
        return self::crawlerDetect()->isCrawler(self::$userAgent);
    }

    /**
     * Get a singleton CrawlerDetect object to call every method it provides.
     * Public access for use of outside this class.
     * Crawler-Detect doku: https://github.com/JayBizzle/Crawler-Detect
     *
     * ***This method has no related global function!***
     * > #### [( jump back )](#available-php-functions)
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
     * Determes if the current device is running an Android operating system.
     *
     * ### is_android
     * Related global function (description see above).
     * > #### [( jump back )](#available-php-functions)
     * ```php
     * is_android(  ): boolean
     * ```
     *
     * @return bool
     * True if current visitor uses an Android based device, false otherwise.
     */
    public static function isAndroid()
    {
        return self::mobileDetect()->version('Android') !== false;
    }

    /**
     * Determes if the current device is an iPhone.
     *
     * ### is_iphone
     * Related global function (description see above).
     * > #### [( jump back )](#available-php-functions)
     * ```php
     * is_iphone(  ): boolean
     * ```
     *
     * @return bool
     * True if current visitor uses an iPhone, false otherwise.
     */
    public static function isIphone()
    {
        return self::mobileDetect()->is('iPhone') !== false;
    }

    /**
     * Determes if the current device is from Samsung.
     *
     * ### is_samsung
     * Related global function (description see above).
     * > #### [( jump back )](#available-php-functions)
     * ```php
     * is_samsung(  ): boolean
     * ```
     *
     * @return bool
     * True if current visitor uses a Samsung device, false otherwise.
     */
    public static function isSamsung()
    {
        return self::mobileDetect()->is('Samsung') !== false;
    }

    /**
     * Determes if the current device is running an iOS operating system.
     *
     * ### is_ios
     * Related global function (description see above).
     * > #### [( jump back )](#available-php-functions)
     * ```php
     * is_ios(  ): boolean
     * ```
     *
     * @return bool
     * True if current visitor uses an iOS device, false otherwise.
     */
    public static function isIOS()
    {
        return self::mobileDetect()->is('iOS') !== false;
    }

    /**
     * Sets the $userAgent (for testing).
     *
     * @ignore
     * @codeCoverageIgnore
     *
     * @param $userAgent
     */
    public static function setUserAgent($userAgent)
    {
        self::mobileDetect()->setUserAgent($userAgent);
        self::$userAgent = $userAgent;
    }
}