<?php
/**
 * Project php-helpers
 * User: claus
 * Date: 13.01.18
 * Time: 13:32
 */

use CNZ\Helpers\User as user;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    protected $iphone = 'Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_3_3 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8J2 Safari/6533.18.5';

    protected $ipod = 'Mozilla/5.0 (iPod; U; CPU iPhone OS 4_3_3 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8J2 Safari/6533.18.5';

    protected $ipad = 'Mozilla/5.0 (iPad; U; CPU OS 4_3_3 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8J2 Safari/6533.18.5';

    protected $samsung = 'Mozilla/5.0 (Linux; Android 4.2.2; nl-nl; SAMSUNG GT-I9505 Build/JDQ39) AppleWebKit/535.19 (KHTML, like Gecko) Version/1.0 Chrome/18.0.1025.308 Mobile Safari/535.19';

    protected $android = 'Mozilla/5.0 (Linux; U; Android 2.2.1; en-us; Nexus One Build/FRG83) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1';

    protected $blackberry = 'Mozilla/5.0 (BlackBerry; U; BlackBerry AAAA; en-US) AppleWebKit/534.11+ (KHTML, like Gecko) Version/X.X.X.X Mobile Safari/534.11+';

    protected $windowsPhone = 'Mozilla/5.0 (compatible; MSIE 9.0; Windows Phone OS 7.5; Trident/5.0; IEMobile/9.0;';

    protected $windows = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36 Edge/12.246';

    protected $apple = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_2) AppleWebKit/601.3.9 (KHTML, like Gecko) Version/9.0.2 Safari/601.3.9';

    protected $linux = 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:15.0) Gecko/20100101 Firefox/15.0.1';

    protected $googleBot = 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)';

    protected $bingBot = 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)';

    protected $yahooBot = 'Mozilla/5.0 (compatible; Yahoo! Slurp; http://help.yahoo.com/help/us/ysearch/slurp)';

    public function test_is_ios()
    {
        $isIOS = [
            $this->iphone,
            $this->ipad,
            $this->ipod
        ];

        $isNotIOS = [
            $this->samsung,
            $this->android,
            $this->windowsPhone
        ];

        foreach ($isIOS as $device) {
            $this->assertTrue(is_ios($device));
            $this->assertTrue(user::isIOS($device));
        }

        foreach ($isNotIOS as $device) {
            $this->assertFalse(is_ios($device));
            $this->assertFalse(user::isIOS($device));
        }
    }

    public function test_is_samsung()
    {
        $isSamsung = [
            $this->samsung
        ];

        $isNotSamsung = [
            $this->android,
            $this->iphone,
            $this->windowsPhone
        ];

        foreach ($isSamsung as $device) {
            $this->assertTrue(is_samsung($device));
            $this->assertTrue(user::isSamsung($device));
        }

        foreach ($isNotSamsung as $device) {
            $this->assertFalse(is_samsung($device));
            $this->assertFalse(user::isSamsung($device));
        }
    }

    public function test_is_iphone()
    {
        $isIphone = [
            $this->iphone
        ];

        $isNotIphone = [
            $this->android,
            $this->windowsPhone
        ];

        foreach ($isIphone as $device) {
            $this->assertTrue(is_iphone($device));
            $this->assertTrue(user::isIphone($device));
        }

        foreach ($isNotIphone as $device) {
            $this->assertFalse(is_iphone($device));
            $this->assertFalse(user::isIphone($device));
        }
    }

    public function test_is_android()
    {
        $isAndroid = [
            $this->android
        ];

        $isNotAndroid = [
            $this->iphone,
            $this->windowsPhone
        ];

        foreach ($isAndroid as $device) {
            $this->assertTrue(is_android($device));
            $this->assertTrue(user::isAndroid($device));
        }

        foreach ($isNotAndroid as $device) {
            $this->assertFalse(is_android($device));
            $this->assertFalse(user::isAndroid($device));
        }
    }

    public function test_is_touch_device()
    {
        $isTouchDevice = [
            $this->ipod,
            $this->iphone,
            $this->blackberry,
            $this->windowsPhone
        ];

        $isNotTouchDevice = [
            $this->windows,
            $this->apple,
            $this->linux,
            $this->googleBot,
            $this->bingBot,
            $this->yahooBot
        ];

        foreach ($isTouchDevice as $device) {
            $this->assertTrue(is_touch_device($device));
            $this->assertTrue(user::isTouchDevice($device));
        }

        foreach ($isNotTouchDevice as $device) {
            $this->assertFalse(is_touch_device($device));
            $this->assertFalse(user::isTouchDevice($device));
        }
    }

    public function test_is_desktop()
    {
        $deviceIsDesktop = [
            $this->windows,
            $this->apple,
            $this->linux
        ];

        $deviceIsNotDesktop = [
            $this->ipod,
            $this->iphone,
            $this->blackberry,
            $this->windowsPhone,
            $this->googleBot,
            $this->bingBot,
            $this->yahooBot
        ];

        foreach ($deviceIsDesktop as $device) {
            $this->assertTrue(is_desktop($device));
            $this->assertTrue(user::isDesktop($device));
        }

        foreach ($deviceIsNotDesktop as $device) {
            $this->assertFalse(is_desktop($device));
            $this->assertFalse(user::isDesktop($device));
        }
    }

    public function test_is_tablet()
    {
        $deviceIsTablet = [
            $this->ipad
        ];

        $deviceIsNotTablet = [
            $this->windows,
            $this->apple,
            $this->linux,
            $this->googleBot,
            $this->bingBot,
            $this->yahooBot,
            $this->iphone,
            $this->windowsPhone,
            $this->ipod
        ];

        foreach ($deviceIsTablet as $device) {
            $this->assertTrue(is_tablet($device));
            $this->assertTrue(user::isTablet($device));
        }

        foreach ($deviceIsNotTablet as $device) {
            $this->assertFalse(is_tablet($device));
            $this->assertFalse(user::isTablet($device));
        }
    }

    public function test_is_smartphone()
    {
        $deviceIsSmartphone = [
            $this->ipod,
            $this->iphone,
            $this->windowsPhone,
        ];

        $deviceIsNotSmartphone = [
            $this->windows,
            $this->apple,
            $this->linux,
            $this->googleBot,
            $this->bingBot,
            $this->yahooBot,
            $this->ipad,
        ];

        foreach ($deviceIsSmartphone as $device) {
            $this->assertTrue(is_smartphone($device));
            $this->assertTrue(user::isSmartphone($device));
        }

        foreach ($deviceIsNotSmartphone as $device) {
            $this->assertFalse(is_smartphone($device));
            $this->assertFalse(user::isSmartphone($device));
        }
    }

    public function test_is_mobile()
    {
        $deviceIsMobile = [
            $this->ipod,
            $this->iphone,
            $this->windowsPhone,
            $this->ipad
        ];

        $deviceIsNotMobile = [
            $this->windows,
            $this->apple,
            $this->linux,
            $this->googleBot,
            $this->bingBot,
            $this->yahooBot
        ];

        foreach ($deviceIsMobile as $device) {
            $this->assertTrue(is_mobile($device));
            $this->assertTrue(user::isMobile($device));
        }

        foreach ($deviceIsNotMobile as $device) {
            $this->assertFalse(is_mobile($device));
            $this->assertFalse(user::isMobile($device));
        }
    }

    public function test_is_robot()
    {
        $userIsRobot = [
            $this->googleBot,
            $this->bingBot,
            $this->yahooBot
        ];

        foreach ($userIsRobot as $robot) {
            $this->assertTrue(is_robot($robot));
            $this->assertTrue(user::isRobot($robot));
        }

        $userIsNotRobot = [
            $this->iphone,
            $this->ipad,
            $this->android,
            $this->windowsPhone
        ];

        foreach ($userIsNotRobot as $robot) {
            $this->assertFalse(is_robot($robot));
            $this->assertFalse(user::isRobot($robot));
        }
    }
}
