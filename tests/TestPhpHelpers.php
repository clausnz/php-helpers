<?php

require __DIR__ . '/../vendor/autoload.php';

use CNZ\Helpers\ArrayHelpers as arr;
use CNZ\Helpers\CommonHelpers as hlp;
use CNZ\Helpers\StringHelpers as str;
use PHPUnit\Framework\TestCase;

class TestPhpHelpers extends TestCase
{
    public $testArray = [
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

    public $testString = 'The quick brown fox jumps over the lazy dog';

    public function test_is_assoc()
    {
        $assocArray = [
            'test1' => 'test1',
            'test2' => 'test2',
            'test3' => 'test3'
        ];

        $stdArray = ['test1', 'test2', 'test3'];

        $arrayTest = [
            // expected => parameter
            true => $assocArray,
            false => $stdArray,
            true => $this->testArray,
            false => 'test',
            true => [null => null],
            false => [null]
        ];

        foreach ($arrayTest as $expected => $parameter) {
            $this->assertEquals($expected, is_assoc($parameter));
            $this->assertEquals($expected, arr::isAssoc($parameter));
        }
    }

    public function test_is_mobile()
    {
        $iphone = 'Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_3_3 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8J2 Safari/6533.18.5';
        $ipod = 'Mozilla/5.0 (iPod; U; CPU iPhone OS 4_3_3 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8J2 Safari/6533.18.5';
        $ipad = 'Mozilla/5.0 (iPad; U; CPU OS 4_3_3 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8J2 Safari/6533.18.5';
        $android = 'Mozilla/5.0 (Linux; U; Android 2.2.1; en-us; Nexus One Build/FRG83) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1';
        $blackberry = 'Mozilla/5.0 (BlackBerry; U; BlackBerry AAAA; en-US) AppleWebKit/534.11+ (KHTML, like Gecko) Version/X.X.X.X Mobile Safari/534.11+';
        $windowsPhone = 'Mozilla/5.0 (compatible; MSIE 9.0; Windows Phone OS 7.5; Trident/5.0; IEMobile/9.0;';

        $windows = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36 Edge/12.246';
        $apple = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_2) AppleWebKit/601.3.9 (KHTML, like Gecko) Version/9.0.2 Safari/601.3.9';
        $linux = 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:15.0) Gecko/20100101 Firefox/15.0.1';

        $googleBot = 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)';
        $bingBot = 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)';
        $yahooBot = 'Mozilla/5.0 (compatible; Yahoo! Slurp; http://help.yahoo.com/help/us/ysearch/slurp)';

        $arrayTest = [
            // expected => parameter
            true => $iphone,
            true => $ipod,
            true => $ipad,
            true => $android,
            true => $blackberry,
            true => $windowsPhone,
            false => $windows,
            false => $apple,
            false => $linux,
            false => $googleBot,
            false => $bingBot,
            false => $yahooBot
        ];

        foreach ($arrayTest as $expected => $parameter) {
            $this->assertEquals($expected, is_mobile($parameter));
            $this->assertEquals($expected, hlp::isMobile($parameter));
        }
    }

    public function test_array_last()
    {
        $testArrayEqual = [
            // expected => parameter
            'value_one' => array_reverse($this->testArray),
            'value_three_one' => array_reverse($this->testArray['three'])
        ];

        foreach ($testArrayEqual as $expected => $parameter) {
            $this->assertEquals($expected, array_last($parameter));
            $this->assertEquals($expected, arr::last($parameter));
        }

        $testArrayNotEqual = [
            // expected => parameter
            'value_two' => array_reverse($this->testArray),
            'value_three_two' => array_reverse($this->testArray['three'])
        ];

        foreach ($testArrayNotEqual as $expected => $parameter) {
            $this->assertNotEquals($expected, array_last($parameter));
            $this->assertNotEquals($expected, arr::last($parameter));
        }
    }

    public function test_array_first()
    {
        $testArrayEqual = [
            // expected
            'value_one'
        ];

        foreach ($testArrayEqual as $expected) {
            $this->assertEquals($expected, array_first($this->testArray));
            $this->assertEquals($expected, arr::first($this->testArray));
        }

        $testArrayNotEqual = [
            // not_expected
            'value_two'
        ];

        foreach ($testArrayNotEqual as $expected) {
            $this->assertNotEquals($expected, array_first($this->testArray));
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
            arr::fromObject($object)
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
