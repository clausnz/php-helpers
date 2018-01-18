<?php
/**
 * Project php-helpers
 * User: claus
 * Date: 18.01.18
 * Time: 22:01
 */

use CNZ\Helpers\Arr as arr;
use CNZ\Helpers\Yml as yml;
use PHPUnit\Framework\TestCase;


class YmlTest extends TestCase
{
    private $testYmlString = "---\nfoo: bar\nbaz: qux\nfoobar:\n  foo: bar\n";

    private $testArray = [
        'foo' => 'bar',
        'baz' => 'qux',
        'foobar' => [
            'foo' => 'bar'
        ]
    ];

    public function test_to_yml()
    {
        $testEqualArray = [
            $this->testArray,
            arr::toObject($this->testArray)
        ];

        foreach ($testEqualArray as $testEqual) {
            $this->assertEquals($this->testYmlString, to_yml($testEqual));
            $this->assertEquals($this->testYmlString, yml::toYml($testEqual));
        }

        $nullArray = [
            'no yaml content',
            '',
            true,
            null
        ];

        foreach ($nullArray as $item) {
            $this->assertNull(to_yml($item));
            $this->assertNull(yml::toYml($item));
        }

    }

    public function test_is_yml()
    {
        $this->assertTrue(is_yml($this->testYmlString));
        $this->assertTrue(yml::isYml($this->testYmlString));

        $testArrayFalse = [
            $this->testArray,
            10,
            true,
            '10',
            'This is a test'
        ];

        foreach ($testArrayFalse as $parameter) {
            $this->assertFalse(is_yml($parameter));
            $this->assertFalse(yml::isYml($parameter));
        }
    }

    public function test_yml_parse()
    {
        $this->assertEquals($this->testArray, yml_parse($this->testYmlString));
        $this->assertEquals($this->testArray, yml::parseYml($this->testYmlString));

        $this->assertTrue(is_array(yml_parse($this->testYmlString)));
        $this->assertTrue(is_array(yml::parseYml($this->testYmlString)));

        $this->assertNull(yml_parse('test string'));
        $this->assertNull(yml::parseYml('test string'));

        $this->assertNull(yml_parse(10));
        $this->assertNull(yml::parseYml(10));
    }
}
