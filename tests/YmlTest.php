<?php
/**
 * Project php-helpers
 * User: claus
 * Date: 18.01.18
 * Time: 22:01
 */

use CNZ\Helpers\Arr as arr;
use CNZ\Helpers\Yml as yml;
use org\bovigo\vfs\vfsStream;
use PHPUnit\Framework\TestCase;


class YmlTest extends TestCase
{
    private $testYmlString = "foo: bar\nbaz: qux\nfoobar:\n  foo: bar\n";

    private $testNoYmlString = "foo: bar baz: qux foobar:   foo: bar";

    private $testArray = [
        'foo' => 'bar',
        'baz' => 'qux',
        'foobar' => [
            'foo' => 'bar'
        ]
    ];

    private $filesystem;

    /**
     * @group 7.1
     */
    public function setUp()
    {
        // define virtual file system
        $directory = [
            'valid.yml' => $this->testYmlString,
            'notvalid.yml' => $this->testNoYmlString
        ];
        // setup and cache the virtual file system
        // use: $validYml = $this->filesystem->url() . '/valid.yml';
        $this->filesystem = vfsStream::setup('root', null, $directory);
    }

    public function test_is_yml_file()
    {
        $this->assertTrue(yml::isValidFile($this->filesystem->url() . '/valid.yml'));
        $this->assertTrue(is_yml_file($this->filesystem->url() . '/valid.yml'));

        $this->assertFalse(yml::isValidFile($this->filesystem->url() . '/notvalid.yml'));
        $this->assertFalse(is_yml_file($this->filesystem->url() . '/notvalid.yml'));

        $this->assertFalse(yml::isValidFile('nofile.txt'));
        $this->assertFalse(is_yml_file('nofile.txt'));
    }

    public function test_to_yml()
    {
        $testEqualArray = [
            $this->testArray,
            arr::toObject($this->testArray)
        ];

        foreach ($testEqualArray as $testEqual) {
            $this->assertEquals($this->testYmlString, to_yml($testEqual));
            $this->assertEquals($this->testYmlString, yml::dump($testEqual));
        }

        $nullArray = [
            'no yaml content',
            '',
            true,
            null
        ];

        foreach ($nullArray as $item) {
            $this->assertNull(to_yml($item));
            $this->assertNull(yml::dump($item));
        }
    }

    public function test_to_yml_file()
    {
        $path = $this->filesystem->url();

        to_yml_file($this->testArray, $path . '/new1.yml');
        yml::dumpFile($this->testArray, $path . '/new2.yml');

        to_yml_file(arr::toObject($this->testArray), $path . '/new3.yml');
        yml::dumpFile(arr::toObject($this->testArray), $path . '/new4.yml');

        $this->assertTrue(yml::isValidFile($path . '/new1.yml'));
        $this->assertTrue(yml::isValidFile($path . '/new2.yml'));
        $this->assertTrue(yml::isValidFile($path . '/new3.yml'));
        $this->assertTrue(yml::isValidFile($path . '/new4.yml'));

        $this->assertEquals($this->testYmlString, file_get_contents($path . '/new1.yml'));
        $this->assertEquals($this->testYmlString, file_get_contents($path . '/new2.yml'));
        $this->assertEquals($this->testYmlString, file_get_contents($path . '/new3.yml'));
        $this->assertEquals($this->testYmlString, file_get_contents($path . '/new4.yml'));

        $testArrayNull = [
            'test',
            //            '',
            //            null,
            //            true
        ];

        foreach ($testArrayNull as $item) {
            $this->assertFalse(to_yml_file($item, $path . '/null.yml'));
            $this->assertFalse(yml::dumpFile($item, $path . '/null.yml'));
        }
    }

    public function test_is_yml()
    {
        $this->assertTrue(is_yml($this->testYmlString));
        $this->assertTrue(yml::isValid($this->testYmlString));

        $testArrayFalse = [
            $this->testNoYmlString,
            $this->testArray,
            10,
            true,
            '10',
            'This is a test'
        ];

        foreach ($testArrayFalse as $parameter) {
            $this->assertFalse(is_yml($parameter));
            $this->assertFalse(yml::isValid($parameter));
        }
    }

    public function test_yml_parse()
    {
        $this->assertEquals($this->testArray, yml_parse($this->testYmlString));
        $this->assertEquals($this->testArray, yml::parse($this->testYmlString));

        $this->assertTrue(is_array(yml_parse($this->testYmlString)));
        $this->assertTrue(is_array(yml::parse($this->testYmlString)));

        $this->assertNull(yml_parse($this->testNoYmlString));
        $this->assertNull(yml::parse($this->testNoYmlString));

        $this->assertNull(yml_parse(10));
        $this->assertNull(yml::parse(10));
    }

    public function test_yml_parse_file()
    {
        $this->assertTrue(is_assoc(yml::parseFile($this->filesystem->url() . '/valid.yml')));
        $this->assertTrue(is_assoc(yml_parse_file($this->filesystem->url() . '/valid.yml')));

        $this->assertFalse(is_assoc(yml::parseFile($this->filesystem->url() . '/notvalid.yml')));
        $this->assertFalse(is_assoc(yml_parse_file($this->filesystem->url() . '/notvalid.yml')));

        $this->assertFalse(is_assoc(yml::parseFile('nofile.yml')));
        $this->assertFalse(is_assoc(yml_parse_file('nofile.yml')));
    }

    public function test_yml_get()
    {
        $this->assertEquals('bar', yml_get('foobar.foo', $this->testYmlString));
        $this->assertEquals('bar', yml::get('foobar.foo', $this->testYmlString));

        $testArrayNull = [
            'cat',
            'test',
            10,
            true,
            $this->testArray
        ];

        foreach ($testArrayNull as $parameter) {
            $this->assertNull(yml_get($parameter, $this->testYmlString));
            $this->assertNull(yml::get($parameter, $this->testYmlString));
        }
    }

    public function test_yml_get_file()
    {
        $valid = $this->filesystem->url() . '/valid.yml';

        $this->assertEquals('bar', yml_get_file('foobar.foo', $valid));
        $this->assertEquals('bar', yml::getFile('foobar.foo', $valid));

        $testArrayNull = [
            'cat',
            'test',
            10,
            true,
            $this->testArray
        ];

        foreach ($testArrayNull as $parameter) {
            $this->assertNull(yml_get_file($parameter, $valid));
            $this->assertNull(yml::getFile($parameter, $valid));
        }
    }

    public function test_yml_set()
    {
        $testArrayEqual = [
            // key = value
            'foobar.foo' => 'test',
            'test' => 'test',
            'foobar.foo.test' => 'test2',
            'array' => $this->testArray
        ];

        foreach ($testArrayEqual as $key => $value) {
            $yml = $this->testYmlString;

            $result = yml_set($key, $value, $yml);
            $this->assertEquals($value, yml::get($key, $yml));
            $this->assertTrue($result);
            $this->assertTrue(yml::isValid($yml));

            $yml = $this->testYmlString;

            $result = yml::set($key, $value, $yml);
            $this->assertEquals($value, yml::get($key, $yml));
            $this->assertTrue($result);
            $this->assertTrue(yml::isValid($yml));
        }

        $testArrayFalse = [
            // key => value
            1 => 1,
            true => 10,
            10 => null,
            null => 'test'
        ];

        foreach ($testArrayFalse as $key => $value) {
            $yml = $this->testYmlString;
            $this->assertFalse(yml_set($key, $value, $yml));

            $yml = $this->testYmlString;
            $this->assertFalse(yml::set($key, $value, $yml));
        }
    }

    public function test_yml_set_file()
    {
        $valid = $this->filesystem->url() . '/valid.yml';

        $testArrayEqual = [
            // key = value
            'foobar.foo' => 'test',
            'test' => 'test',
            'foobar.foo.test' => 'test2',
            'array' => $this->testArray
        ];

        foreach ($testArrayEqual as $key => $value) {
            $result = yml_set_file($key, $value, $valid);
            $this->assertEquals($value, yml::getFile($key, $valid));
            $this->assertTrue($result);

            $key .= '.two';
            $result = yml::setFile($key, $value, $valid);
            $this->assertEquals($value, yml::getFile($key, $valid));
            $this->assertTrue($result);
        }

        $testArrayFalse = [
            // key => value
            1 => 1,
            true => 10,
            10 => null,
            null => 'test'
        ];

        foreach ($testArrayFalse as $key => $value) {
            $this->assertFalse(yml_set_file($key, $value, $valid));
            $this->assertFalse(yml::set($key, $value, $valid));
        }

    }
}
