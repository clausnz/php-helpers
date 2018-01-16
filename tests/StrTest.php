<?php
/**
 * Project php-helpers
 * User: claus
 * Date: 13.01.18
 * Time: 13:22
 */

use CNZ\Helpers\Str as str;
use PHPUnit\Framework\TestCase;

class StrTest extends TestCase
{
    protected $testString = 'The quick brown fox jumps over the lazy dog';

    public function test_str_insert()
    {
        $string = 'This is a quick :type with lot of :item.';
        $result = 'This is a quick test with lot of words.';

        $arrayTrue = [
            ':type' => 'test',
            ':item' => 'words'
        ];

        $this->assertEquals($result, str_insert($arrayTrue, $string));

        $arrayFalse = [
            ':type' => 'test',
            ':item' => 'abc'
        ];

        $this->assertNotEquals($result, str_insert($arrayFalse, $string));

        $arrayFalse = [
            ':type' => 'abc',
            ':item' => 'abc'
        ];

        $this->assertNotEquals($result, str_insert($arrayFalse, $string));
    }

    public function test_str_between()
    {
        $testArrayEqual = [
            // expected => parameter
            'quick' => ['The', 'brown'],
            'fox' => ['brown', 'jumps']
        ];

        foreach ($testArrayEqual as $expected => $arrayParameter) {
            $this->assertEquals($expected, str_between($arrayParameter[0], $arrayParameter[1], $this->testString)[0]);
        }

        $testArrayEqual = [
            // parameter
            ['The', '.'],
            ['bar', 'baz']
        ];

        foreach ($testArrayEqual as $arrayParameter) {
            $this->assertEquals([],
                str_between($arrayParameter[0], $arrayParameter[1], $this->testString));
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

    public function test_str_after_last()
    {
        $testString = "/var/www/html/public/img/background.jpg";

        $testArrayEqual = [
            // expected => parameter
            'background.jpg' => '/',
            'jpg' => '.',
            'ckground.jpg' => 'a'
        ];

        foreach ($testArrayEqual as $expected => $parameter) {
            $this->assertEquals($expected, str_after_last($parameter, $testString));
            $this->assertEquals($expected, str::afterLast($parameter, $testString));
        }

        $testArrayNotEqual = [
            // not_expected => parameter
            'cat' => 'fox',
            'cats' => '.'
        ];

        foreach ($testArrayNotEqual as $expected => $parameter) {
            $this->assertNotEquals($expected, str_after_last($parameter, $this->testString));
            $this->assertNotEquals($expected, str::afterLast($parameter, $this->testString));
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
            $this->assertFalse(str_ends_with($testFalse, $this->testString));
            $this->assertFalse(str::endsWith($testFalse, $this->testString));
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
