<?php
/**
 * Project php-helpers
 * User: claus
 * Date: 13.01.18
 * Time: 13:21
 */

use CNZ\Helpers\Arr as arr;
use PHPUnit\Framework\TestCase;

class ArrTest extends TestCase
{
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
}
