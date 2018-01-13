<?php
/**
 * PHPUnit test class for usefull php helper functions
 *
 * @author      Claus Bayer <claus.bayer@gmail.com>
 * @link        https://github.com/clausnz/php-helpers
 * @license     MIT
 *
 */

require __DIR__ . '/../vendor/autoload.php';

use CNZ\Helpers\Arr as arr;
use CNZ\Helpers\Mob as mobile;
use CNZ\Helpers\Str as str;
use PHPUnit\Framework\TestCase;

class PhpHelpersTestIgnore extends TestCase
{
    protected $testString = 'The quick brown fox jumps over the lazy dog';

    protected $testArray = [
        'one' => 'value_one',
        'two' => 'value_two',
        'three' => [
            'three_one' => 'value_three_one',
            'three_two' => 'value_three_two',
            'three_three' => [
                'three_three_one' => 'value_three_three_one',
                'three_three_two' => 'value_three_three_two',
                'three_three_three' => 'value_three_three_three'
            ]
        ]
    ];

    protected $iphone = 'Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_3_3 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8J2 Safari/6533.18.5';

    protected $ipod = 'Mozilla/5.0 (iPod; U; CPU iPhone OS 4_3_3 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8J2 Safari/6533.18.5';

    protected $ipad = 'Mozilla/5.0 (iPad; U; CPU OS 4_3_3 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8J2 Safari/6533.18.5';

    protected $android = 'Mozilla/5.0 (Linux; U; Android 2.2.1; en-us; Nexus One Build/FRG83) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1';

    protected $blackberry = 'Mozilla/5.0 (BlackBerry; U; BlackBerry AAAA; en-US) AppleWebKit/534.11+ (KHTML, like Gecko) Version/X.X.X.X Mobile Safari/534.11+';

    protected $windowsPhone = 'Mozilla/5.0 (compatible; MSIE 9.0; Windows Phone OS 7.5; Trident/5.0; IEMobile/9.0;';

    protected $windows = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36 Edge/12.246';

    protected $apple = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_2) AppleWebKit/601.3.9 (KHTML, like Gecko) Version/9.0.2 Safari/601.3.9';

    protected $linux = 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:15.0) Gecko/20100101 Firefox/15.0.1';

    protected $googleBot = 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)';

    protected $bingBot = 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)';

    protected $yahooBot = 'Mozilla/5.0 (compatible; Yahoo! Slurp; http://help.yahoo.com/help/us/ysearch/slurp)';


//    public function test_user_ip()
//    {
//        $ips = [
//            user_ip(),
//            user::ip()
//        ];
//
//        foreach ($ips as $ip) {
//
//            $testArray = [
//                // expected => parameter
//                true => str_contains('.', $ip),
//            ];
//
//            foreach ($testArray as $expected => $parameter) {
//                $this->assertEquals($expected, $parameter);
//            }
//        }
//    }


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
            $this->assertTrue(mobile::isTouchDevice($device));
        }

        foreach ($isNotTouchDevice as $device) {
            $this->assertFalse(is_touch_device($device));
            $this->assertFalse(mobile::isTouchDevice($device));
        }
    }

    public function test_is_desktop()
    {
        $deviceIsDesktop = [
            $this->windows,
            $this->apple,
            $this->linux,
            $this->googleBot,
            $this->bingBot,
            $this->yahooBot
        ];

        $deviceIsNotDesktop = [
            $this->ipod,
            $this->iphone,
            $this->blackberry,
            $this->windowsPhone
        ];

        foreach ($deviceIsDesktop as $device) {
            $this->assertTrue(is_desktop($device));
            $this->assertTrue(mobile::isDesktop($device));
        }

        foreach ($deviceIsNotDesktop as $device) {
            $this->assertFalse(is_desktop($device));
            $this->assertFalse(mobile::isDesktop($device));
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
            $this->assertTrue(mobile::isTablet($device));
        }

        foreach ($deviceIsNotTablet as $device) {
            $this->assertFalse(is_tablet($device));
            $this->assertFalse(mobile::isTablet($device));
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
            $this->assertTrue(mobile::isSmartphone($device));
        }

        foreach ($deviceIsNotSmartphone as $device) {
            $this->assertFalse(is_smartphone($device));
            $this->assertFalse(mobile::isSmartphone($device));
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
            $this->assertTrue(mobile::isMobile($device));
        }

        foreach ($deviceIsNotMobile as $device) {
            $this->assertFalse(is_mobile($device));
            $this->assertFalse(mobile::isMobile($device));
        }
    }

    public function test_is_assoc()
    {
        $assocArray = [
            'test1' => 'test1',
            'test2' => 'test2',
            'test3' => 'test3'
        ];

        $stdArray = ['test1', 'test2', 'test3'];

        $isAssoc = [
            // parameter
            $assocArray,
            $this->testArray
        ];

        $isNotAssoc = [
            // parameter
            $stdArray,
            'test'
        ];

        foreach ($isAssoc as $assoc) {
            $this->assertTrue(is_assoc($assoc));
            $this->assertTrue(arr::isAssoc($assoc));
        }

        foreach ($isNotAssoc as $notAssoc) {
            $this->assertFalse(is_assoc($notAssoc));
            $this->assertFalse(arr::isAssoc($notAssoc));
        }
    }

    public function test_array_last()
    {
        $isArrayLast = [
            // expected => array
            'value_one' => array_reverse($this->testArray),
            'value_three_one' => array_reverse($this->testArray['three'])
        ];

        foreach ($isArrayLast as $expected => $array) {
            $this->assertEquals($expected, array_last($array));
            $this->assertEquals($expected, arr::last($array));
        }

        $isNotArrayLast = [
            // expected => array
            'value_two' => array_reverse($this->testArray),
            'value_three_two' => array_reverse($this->testArray['three'])
        ];

        foreach ($isNotArrayLast as $notExpected => $array) {
            $this->assertNotEquals($notExpected, array_last($array));
            $this->assertNotEquals($notExpected, arr::last($array));
        }
    }

    public function test_array_first()
    {
        $isArrayFirst = [
            // expected
            'value_one'
        ];

        foreach ($isArrayFirst as $expected) {
            $this->assertEquals($expected, array_first($this->testArray));
            $this->assertEquals($expected, arr::first($this->testArray));
        }

        $isNotArrayFirst = [
            // not_expected
            'value_two'
        ];

        foreach ($isNotArrayFirst as $notExpected) {
            $this->assertNotEquals($notExpected, array_first($this->testArray));
        }

    }

    public function test_str_before()
    {
        $testArrayEqual = [
            // expected => parameter
            'The quick brown' => 'fox',
            'The quick brown fox jumps over the lazy' => 'dog'
        ];

        foreach ($testArrayEqual as $expected => $parameter) {
            $this->assertEquals($expected, str_before($parameter, $this->testString));
            $this->assertEquals($expected, str::before($parameter, $this->testString));
        }

        $testArrayNotEqual = [
            // not_expected => parameter
            'The quick' => 'fox',
            'quick' => 'cat'
        ];

        foreach ($testArrayNotEqual as $expected => $parameter) {
            $this->assertNotEquals($expected, str_before($parameter, $this->testString));
            $this->assertNotEquals($expected, str::before($parameter, $this->testString));
        }
    }

    public function test_str_after()
    {
        $testArrayEqual = [
            // expected => parameter
            'dog' => 'lazy',
            '' => 'dog',
            $this->testString => '',
            'quick brown fox jumps over the lazy dog' => ' '
        ];

        foreach ($testArrayEqual as $expected => $parameter) {
            $this->assertEquals($expected, str_after($parameter, $this->testString));
            $this->assertEquals($expected, str::after($parameter, $this->testString));
        }

        $testArrayNotEqual = [
            // not_expected => parameter
            'The quick brown' => 'fox',
            'quick' => 'cat'
        ];

        foreach ($testArrayNotEqual as $expected => $parameter) {
            $this->assertNotEquals($expected, str_after($parameter, $this->testString));
            $this->assertNotEquals($expected, str::after($parameter, $this->testString));
        }
    }

    public function test_str_limit_words()
    {
        $testArrayEqual = [
            // expected => parameter
            'The quick brown...' => 3,
            $this->testString => 100
        ];

        foreach ($testArrayEqual as $expected => $parameter) {
            $this->assertEquals($expected, str_limit_words($this->testString, $parameter));
            $this->assertEquals($expected, str::limitWords($this->testString, $parameter));
        }

        $testArrayNotEqual = [
            // not_expected => parameter
            'The' => 2,
            $this->testString => 8
        ];

        foreach ($testArrayNotEqual as $expected => $parameter) {
            $this->assertNotEquals($expected, str_limit_words($this->testString, $parameter));
            $this->assertNotEquals($expected, str::limitWords($this->testString, $parameter));
        }
    }

    public function test_str_limit()
    {
        $testArrayEqual = [
            // expected => parameter
            'The...' => 3,
            $this->testString => 100
        ];

        foreach ($testArrayEqual as $expected => $parameter) {
            $this->assertEquals($expected, str_limit($this->testString, $parameter));
            $this->assertEquals($expected, str::limit($this->testString, $parameter));
        }

        $testArrayNotEqual = [
            // not_expected => parameter
            'The' => 3,
            $this->testString . '...' => 100
        ];

        foreach ($testArrayNotEqual as $expected => $parameter) {
            $this->assertNotEquals($expected, str_limit($this->testString, $parameter));
            $this->assertNotEquals($expected, str::limit($this->testString, $parameter));
        }
    }

    public function test_to_object()
    {
        $arrayTest = [
            to_object($this->testArray),
            arr::toObject($this->testArray)
        ];

        foreach ($arrayTest as $test) {
            $testArrayEqual = [
                // expected => parameter
                'value_one' => $test->one,
                'value_three_one' => $test->three->three_one,
                'value_three_three_one' => $test->three->three_three->three_three_one
            ];

            foreach ($testArrayEqual as $expected => $parameter) {
                $this->assertEquals($expected, $parameter);
            }

            $testArrayNotEqual = [
                // not_expected => parameter
                'value_one' => $test->two,
                'value_three_one' => $test->three->three_two,
                'value_three_three_one' => $test->three->three_three->three_three_two
            ];

            foreach ($testArrayNotEqual as $expected => $parameter) {
                $this->assertNotEquals($expected, $parameter);
            }
        }
    }

    public function test_to_array()
    {
        $object = to_object($this->testArray);

        $arrayTest = [
            to_array($object),
            arr::toArray($object)
        ];

        foreach ($arrayTest as $test) {

            $testArrayEqual = [
                'value_one' => $test['one'],
                'value_three_one' => $test['three']['three_one'],
                'value_three_three_one' => $test['three']['three_three']['three_three_one']
            ];

            $testArrayNotEqual = [
                'value_one' => $test['two'],
                'value_three_one' => $test['three']['three_two'],
                'value_three_three_one' => $test['three']['three_three']['three_three_two']
            ];

            foreach ($testArrayEqual as $expected => $parameter) {
                $this->assertEquals($expected, $parameter);
            }

            foreach ($testArrayNotEqual as $expected => $parameter) {
                $this->assertNotEquals($expected, $parameter);
            }
        }
    }

    public function test_str_iends_with()
    {
        $testArrayTrue = [
            'g',
            'G',
            ['cat', 'dog'],
        ];

        foreach ($testArrayTrue as $testTrue) {
            $this->assertTrue(str_iends_with($testTrue, $this->testString));
            $this->assertTrue(str::endsWithIgnoreCase($testTrue, $this->testString));
        }

        $testArrayFalse = [
            't',
            ['cat', 'CAT']
        ];

        foreach ($testArrayFalse as $testFalse) {
            $this->assertFalse(str_iends_with($testFalse, $this->testString));
            $this->assertFalse(str::endsWithIgnoreCase($testFalse, $this->testString));
        }
    }

    public function test_str_ends_with()
    {
        $testArrayTrue = [
            'g',
            'dog',
            ['cat', 'dog'],
        ];

        foreach ($testArrayTrue as $testTrue) {
            $this->assertTrue(str_ends_with($testTrue, $this->testString));
            $this->assertTrue(str::endsWithIgnoreCase($testTrue, $this->testString));
        }

        $testArrayFalse = [
            't',
            ['cat', 'CAT']
        ];

        foreach ($testArrayFalse as $testFalse) {
            $this->assertFalse(str_iends_with($testFalse, $this->testString));
            $this->assertFalse(str::endsWithIgnoreCase($testFalse, $this->testString));
        }
    }

    public function test_str_istarts_with()
    {
        $testArrayTrue = [
            't',
            'T',
            ['CAT', 'THE'],
        ];

        foreach ($testArrayTrue as $testTrue) {
            $this->assertTrue(str_istarts_with($testTrue, $this->testString));
            $this->assertTrue(str::startsWithIgnoreCase($testTrue, $this->testString));
        }

        $testArrayFalse = [
            'S',
            ['cat', 'CAT']
        ];

        foreach ($testArrayFalse as $testFalse) {
            $this->assertFalse(str_istarts_with($testFalse, $this->testString));
            $this->assertFalse(str::startsWithIgnoreCase($testFalse, $this->testString));
        }
    }

    public function test_str_starts_with()
    {
        $testArrayTrue = [
            'The',
            'T',
            ['cat', 'The']
        ];

        foreach ($testArrayTrue as $testTrue) {
            $this->assertTrue(str_starts_with($testTrue, $this->testString));
            $this->assertTrue(str::startsWith($testTrue, $this->testString));
        }

        $testArrayFalse = [
            'the',
            't',
            ['cat', 'the']
        ];

        foreach ($testArrayFalse as $testFalse) {
            $this->assertFalse(str_starts_with($testFalse, $this->testString));
            $this->assertFalse(str::startsWith($testFalse, $this->testString));
        }
    }

    public function test_str_icontains()
    {
        $testArrayTrue = [
            'QUICK',
            'the',
            't',
            ['CAT', 'DOG']
        ];

        foreach ($testArrayTrue as $testTrue) {
            $this->assertTrue(str_icontains($testTrue, $this->testString));
            $this->assertTrue(str::containsIgnoreCase($testTrue, $this->testString));
        }

        $testArrayFalse = [
            'cat',
            'CAT',
            ['CAT', 'cat']
        ];

        foreach ($testArrayFalse as $testFalse) {
            $this->assertFalse(str_icontains($testFalse, $this->testString));
            $this->assertFalse(str::containsIgnoreCase($testFalse, $this->testString));
        }
    }

    public function test_str_contains()
    {
        $testArrayTrue = [
            'quick',
            'The',
            'g',
            ['cat', 'quick']
        ];

        foreach ($testArrayTrue as $testTrue) {
            $this->assertTrue(str_contains($testTrue, $this->testString));
            $this->assertTrue(str::contains($testTrue, $this->testString));
        }

        $testArrayFalse = [
            'cat',
            'B',
            ['cat', 'B']
        ];

        foreach ($testArrayFalse as $testFalse) {
            $this->assertFalse(str_contains($testFalse, $this->testString));
            $this->assertFalse(str::contains($testFalse, $this->testString));
        }
    }

}
