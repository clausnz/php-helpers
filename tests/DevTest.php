<?php
/**
 * Project php-helpers
 * Dev: claus
 * Date: 13.01.18
 * Time: 13:32
 */

use CNZ\Helpers\Dev as dev;
use PHPUnit\Framework\TestCase;

class DevTest extends TestCase
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

    protected $kindl = 'Mozilla/5.0 (X11; U; Linux armv7l like Android; en-us) AppleWebKit/531.2+ (KHTML, like Gecko) Version/5.0 Safari/533.2+ Kindle/3.0+';

    protected $playstation = 'Mozilla/5.0 (PlayStation 4 3.11) AppleWebKit/537.73 (KHTML, like Gecko)';

    protected $amazonFireTv = 'Mozilla/5.0 (Linux; Android 4.2.2; AFTB Build/JDQ39) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.173 Mobile Safari/537.22';

    protected $tablet = 'Mozilla/5.0 (Linux; Android 5.0.2; LG-V410/V41020c Build/LRX22G) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/34.0.1847.118 Safari/537.36';

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
            dev::setUserAgent($device);
            $this->assertTrue(is_ios());
            $this->assertTrue(dev::isIOS());
        }

        foreach ($isNotIOS as $device) {
            dev::setUserAgent($device);
            $this->assertFalse(is_ios());
            $this->assertFalse(dev::isIOS());
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
            dev::setUserAgent($device);
            $this->assertTrue(is_samsung());
            $this->assertTrue(dev::isSamsung());
        }

        foreach ($isNotSamsung as $device) {
            dev::setUserAgent($device);
            $this->assertFalse(is_samsung());
            $this->assertFalse(dev::isSamsung());
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
            dev::setUserAgent($device);
            $this->assertTrue(is_iphone());
            $this->assertTrue(dev::isIphone());
        }

        foreach ($isNotIphone as $device) {
            dev::setUserAgent($device);
            $this->assertFalse(is_iphone());
            $this->assertFalse(dev::isIphone());
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
            dev::setUserAgent($device);
            $this->assertTrue(is_android());
            $this->assertTrue(dev::isAndroid());
        }

        foreach ($isNotAndroid as $device) {
            dev::setUserAgent($device);
            $this->assertFalse(is_android());
            $this->assertFalse(dev::isAndroid());
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
            $this->yahooBot,
            $this->amazonFireTv,
            $this->tablet
        ];

        foreach ($deviceIsDesktop as $device) {
            dev::setUserAgent($device);
            $this->assertTrue(is_desktop());
            $this->assertTrue(dev::isDesktop());
        }

        foreach ($deviceIsNotDesktop as $device) {
            dev::setUserAgent($device);
            $this->assertFalse(is_desktop());
            $this->assertFalse(dev::isDesktop());
        }
    }

    public function test_is_tablet()
    {
        $deviceIsTablet = [
            $this->ipad,
            $this->tablet
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
            $this->ipod,
            $this->amazonFireTv
        ];

        foreach ($deviceIsTablet as $device) {
            dev::setUserAgent($device);
            $this->assertTrue(is_tablet());
            $this->assertTrue(dev::isTablet());
        }

        foreach ($deviceIsNotTablet as $device) {
            dev::setUserAgent($device);
            $this->assertFalse(is_tablet());
            $this->assertFalse(dev::isTablet());
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
            $this->tablet
        ];

        foreach ($deviceIsSmartphone as $device) {
            dev::setUserAgent($device);
            $this->assertTrue(is_smartphone());
            $this->assertTrue(dev::isSmartphone());
        }

        foreach ($deviceIsNotSmartphone as $device) {
            dev::setUserAgent($device);
            $this->assertFalse(is_smartphone());
            $this->assertFalse(dev::isSmartphone());
        }
    }

    public function test_is_mobile()
    {
        $deviceIsMobile = [
            $this->ipod,
            $this->iphone,
            $this->windowsPhone,
            $this->ipad,
            $this->tablet
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
            dev::setUserAgent($device);
            $this->assertTrue(is_mobile());
            $this->assertTrue(dev::isMobile());
        }

        foreach ($deviceIsNotMobile as $device) {
            dev::setUserAgent($device);
            $this->assertFalse(is_mobile());
            $this->assertFalse(dev::isMobile());
        }
    }

    public function test_is_robot()
    {
        $userIsRobot = [
            $this->googleBot,
            $this->bingBot,
            $this->yahooBot
        ];

        foreach ($userIsRobot as $device) {
            dev::setUserAgent($device);
            $this->assertTrue(is_robot());
            $this->assertTrue(dev::isRobot());
        }

        $userIsNotRobot = [
            $this->iphone,
            $this->ipad,
            $this->android,
            $this->windowsPhone,
            $this->amazonFireTv,
            $this->tablet
        ];

        foreach ($userIsNotRobot as $device) {
            dev::setUserAgent($device);
            $this->assertFalse(is_robot());
            $this->assertFalse(dev::isRobot());
        }
    }
}
