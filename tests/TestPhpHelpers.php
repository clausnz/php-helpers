<?php
/**
 * Project php-helpers
 * User: claus
 * Date: 07.01.18
 * Time: 23:40
 */

use PHPUnit\Framework\TestCase;

class TestPhpHelpers extends TestCase
{
    public function test_to_object()
    {
        $array = [
            'foo' => 'bar',
            'bar' => 'foo',
            'baz' => [
                'foo' => 'bar',
                'bar' => 'foo'
            ]
        ];

        $object_result = to_object($array);

        $this->assertEquals('bar', $object_result->foo);
        $this->assertEquals('bar', $object_result->baz->foo);

        $this->assertNotEquals('bar', $object_result->bar);
        $this->assertNotEquals('bar', $object_result->baz->bar);
    }

    public function test_to_array()
    {
        $object = new stdClass();
        $object->foo = 'bar';
        $object->bar = 'foo';

        $object->baz = new stdClass();
        $object->baz->foo = 'bar';
        $object->baz->bar = 'foo';

        $array_result = to_array($object);

        $this->assertEquals('bar', $array_result['foo']);
        $this->assertNotEquals('bar', $array_result['bar']);

        $this->assertEquals('bar', $array_result['baz']['foo']);
        $this->assertNotEquals('bar', $array_result['baz']['bar']);


    }

    public function test_str_iends_with()
    {
        $haystack = 'This is a test';

        $this->assertTrue(str_iends_with('t', $haystack));
        $this->assertTrue(str_iends_with('T', $haystack));
        $this->assertFalse(str_iends_with('s', $haystack));

        $this->assertTrue(str_iends_with(['foo', 't'], $haystack));
        $this->assertTrue(str_iends_with(['foo', 'T'], $haystack));
        $this->assertFalse(str_iends_with(['foo', 'bar'], $haystack));
    }

    public function test_str_ends_with()
    {
        $haystack = 'This is a test';

        $this->assertTrue(str_ends_with('t', $haystack));
        $this->assertFalse(str_ends_with('T', $haystack));
        $this->assertFalse(str_ends_with('s', $haystack));

        $this->assertTrue(str_ends_with(['foo', 't'], $haystack));
        $this->assertFalse(str_ends_with(['foo', 'T'], $haystack));
        $this->assertFalse(str_ends_with(['foo', 'bar'], $haystack));
    }

    public function test_str_istarts_with()
    {
        $haystack = 'This is a test.';

        $this->assertTrue(str_istarts_with('This', $haystack));
        $this->assertTrue(str_istarts_with('this', $haystack));
        $this->assertFalse(str_starts_with('his', $haystack));

        $this->assertTrue(str_istarts_with(['foo', 'This'], $haystack));
        $this->assertTrue(str_istarts_with(['foo', 'this'], $haystack));
        $this->assertFalse(str_istarts_with(['foo', 'bar'], $haystack));
    }

    public function test_str_starts_with()
    {
        $haystack = 'This is a test.';

        $this->assertTrue(str_starts_with('This', $haystack));
        $this->assertFalse(str_starts_with('this', $haystack));
        $this->assertFalse(str_starts_with('his', $haystack));

        $this->assertTrue(str_starts_with(['foo', 'This'], $haystack));
        $this->assertFalse(str_starts_with(['foo', 'this'], $haystack));
        $this->assertFalse(str_starts_with(['foo', 'bar'], $haystack));
    }

    public function test_str_icontains()
    {
        $haystack = 'This is a test.';

        $this->assertTrue(str_icontains('test', $haystack));
        $this->assertTrue(str_icontains('Test', $haystack));

        $this->assertTrue(str_icontains(['foor', 'test'], $haystack));
        $this->assertTrue(str_icontains(['foo', 'Test'], $haystack));
        $this->assertFalse(str_icontains(['foo', 'bar'], $haystack));
    }

    public function test_str_contains()
    {
        $haystack = 'This is a test.';

        $this->assertTrue(str_contains('test', $haystack));
        $this->assertFalse(str_contains('Test', $haystack));

        $this->assertTrue(str_contains(['foo', 'test'], $haystack));
        $this->assertFalse(str_contains(['foo', 'Test'], $haystack));
    }

}
