[![Build Status](https://travis-ci.org/clausnz/php-helpers.svg?branch=master)](https://travis-ci.org/clausnz/php-helpers)

# About

The library `clausnz/php-helpers`  is a collection of **45** useful php helper functions `(PHP 5.6, 7.*)`.  
After installation with `composer`, the global functions are accessable from everywhere in your code:

#### Installation
```bash
composer require clausnz/php-helpers
```

#### Example
```php
<?php

dump( 'any content' );
```

If a function with the same name already exists in the list of your project's defined functions ( built-in and user-defined ), it will simply not be registered in your environment. Therefore, **no conflicts** with existing functions will appear.  

Nevertheless, every function is still accessable it in a static way with the proper use-statement:

#### Example
```php
<?php

use CNZ\Helpers\Util as util;

util::dump( 'any content' );
```

## CREDITS

This library makes use of the following brilliant and well known libraries:

- https://github.com/serbanghita/Mobile-Detect
- https://github.com/JayBizzle/Crawler-Detect
- https://github.com/mustangostang/spyc

## Tests

All functions are tested against a number of unit tests and PHP Versions. 
[![Build Status](https://travis-ci.org/clausnz/php-helpers.svg?branch=master)](https://travis-ci.org/clausnz/php-helpers)
# Install

Install the latest `clausnz/php-helper` library with composer:

```bash
composer require clausnz/php-helpers
```

Also make sure to require your composer autoload file:

```php
require __DIR__ . '/vendor/autoload.php';
```

After installation, the new global PHP functions are available everywhere in your code. To access the ( almost identical ) static functions in the helper classes, add the proper use statement to your file:

#### Example
 ```php
 <?php
 
use CNZ\Helpers\Dev as dev;

if( dev::isIphone() ) {
    // Do something here
}
 ```
 # Available PHP Functions

## Table of Contents

* [Device](#is_mobile)
    * [is_mobile](#is_mobile)
    * [is_smartphone](#is_smartphone)
    * [is_tablet](#is_tablet)
    * [is_desktop](#is_desktop)
    * [is_robot](#is_robot)
    * [is_ios](#is_ios)
    * [is_android](#is_android)
    * [is_iphone](#is_iphone)
    * [is_samsung](#is_samsung)
* [Array](#array_get)
    * [array_get](#array_get)
    * [array_set](#array_set)
    * [array_first](#array_first)
    * [array_last](#array_last)
    * [to_array](#to_array)
    * [to_object](#to_object)
    * [is_assoc](#is_assoc)
* [String](#str_before)
    * [str_before](#str_before)
    * [str_after](#str_after)
    * [str_after_last](#str_after_last)
    * [str_between](#str_between)
    * [str_insert](#str_insert)
    * [str_limit](#str_limit)
    * [str_limit_words](#str_limit_words)
    * [str_contains](#str_contains)
    * [str_icontains](#str_icontains)
    * [str_starts_with](#str_starts_with)
    * [str_istarts_with](#str_istarts_with)
    * [str_ends_with](#str_ends_with)
    * [str_iends_with](#str_iends_with)
* [Utils](#ip)
    * [ip](#ip)
    * [is_email](#is_email)
    * [dump](#dump)
    * [dd](#dd)
    * [crypt_password](#crypt_password)
    * [is_password](#is_password)
* [Yml](#to_yml)
    * [to_yml](#to_yml)
    * [to_yml_file](#to_yml_file)
    * [yml_parse](#yml_parse)
    * [yml_parse_file](#yml_parse_file)
    * [is_yml](#is_yml)
    * [is_yml_file](#is_yml_file)
    * [yml_get](#yml_get)
    * [yml_get_file](#yml_get_file)
    * [yml_set](#yml_set)
    * [yml_set_file](#yml_set_file)
# API Documentation

## Table of Contents

* [Arr](#arr)
    * [isAssoc](#isassoc)
    * [toObject](#toobject)
    * [dump](#dump)
    * [first](#first)
    * [last](#last)
    * [get](#get)
    * [set](#set)
* [Dev](#dev)
    * [isSmartphone](#issmartphone)
    * [isMobile](#ismobile)
    * [mobileDetect](#mobiledetect)
    * [isTablet](#istablet)
    * [isDesktop](#isdesktop)
    * [isRobot](#isrobot)
    * [crawlerDetect](#crawlerdetect)
    * [isAndroid](#isandroid)
    * [isIphone](#isiphone)
    * [isSamsung](#issamsung)
    * [isIOS](#isios)
* [Str](#str)
    * [insert](#insert)
    * [between](#between)
    * [after](#after)
    * [before](#before)
    * [limitWords](#limitwords)
    * [limit](#limit)
    * [contains](#contains)
    * [containsIgnoreCase](#containsignorecase)
    * [startsWith](#startswith)
    * [startsWithIgnoreCase](#startswithignorecase)
    * [endsWith](#endswith)
    * [endsWithIgnoreCase](#endswithignorecase)
    * [afterLast](#afterlast)
* [Util](#util)
    * [isEmail](#isemail)
    * [ip](#ip)
    * [cryptPassword](#cryptpassword)
    * [isPassword](#ispassword)
    * [dd](#dd)
    * [dump](#dump-1)
* [Yml](#yml)
    * [isValidFile](#isvalidfile)
    * [isValid](#isvalid)
    * [parse](#parse)
    * [get](#get-1)
    * [getFile](#getfile)
    * [parseFile](#parsefile)
    * [setFile](#setfile)
    * [dumpFile](#dumpfile)
    * [dump](#dump-2)
    * [set](#set-1)

## Arr

Helper class that provides easy access to useful php array functions.

Class Arr

* Full name: \CNZ\Helpers\Arr


### isAssoc

Detects if the given value is an associative array.

```php
Arr::isAssoc( array $array ): boolean
```

### is_assoc
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
is_assoc( array $array ): boolean
```

#### Example
```php
$array = [
    'foo' => 'bar'
];

is_assoc( $array );

// bool(true)
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** | Any type of array. |


**Return Value:**

True if the array is associative, false otherwise.



---

### toObject

Converts an array to an object.

```php
Arr::toObject( array $array ): object|null
```

### to_object
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
to_object( array $array ): object|null
```

#### Example
```php
$array = [
    'foo' => [
         'bar' => 'baz'
    ]
];

$obj = to_object($array);
echo $obj->foo->bar;

// baz
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** | The array to be converted. |


**Return Value:**

A std object representation of the converted array.



---

### dump

Converts a string or an object to an array.

```php
Arr::dump( string|object $var ): array|null
```

### to_array
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
to_array( string|object $var ): array|null
```

#### Example 1 (string)
```php
$var = 'php';
to_array( $var );

// (
//     [0] => p
//     [1] => h
//     [2] => p
// )

```
#### Example 2 (object)
```php
$var = new stdClass;
$var->foo = 'bar';

to_array( $var );

// (
//     [foo] => bar
// )
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$var` | **string&#124;object** | String or object. |


**Return Value:**

An array representation of the converted string or object.
Returns null on error.



---

### first

Returns the first element of an array.

```php
Arr::first( array $array ): mixed
```

### array_first
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
array_first( array $array ): mixed
```

#### Example
```php
$array = [
     'foo' => 'bar',
     'baz' => 'qux'
];

array_first( $array )

// bar
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** | The concerned array. |


**Return Value:**

The value of the first element, without key. Mixed type.



---

### last

Returns the last element of an array.

```php
Arr::last( array $array ): mixed
```

### array_last
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
array_last( array $array ): mixed
```

#### Example
```php
$array = [
     'foo' => 'bar',
     'baz' => 'qux'
];

array_last( $array )

// qux
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** | The concerned array. |


**Return Value:**

The value of the last element, without key. Mixed type.



---

### get

Gets a value in an array by dot notation for the keys.

```php
Arr::get( string $key, array $array ): mixed
```

### array_get
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
array_get( string key, array $array ): mixed
```

#### Example
```php
$array = [
     'foo' => 'bar',
     'baz' => [
         'qux => 'foobar'
     ]
];

array_get( 'baz.qux', $array );

// foobar
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$key` | **string** | The key by dot notation. |
| `$array` | **array** | The array to search in. |


**Return Value:**

The searched value, null otherwise.



---

### set

Sets a value in an array using the dot notation.

```php
Arr::set( string $key, mixed $value, array &$array ): boolean
```

### array_set
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
array_set( string key, mixed value, array $array ): boolean
```

#### Example 1
```php
$array = [
     'foo' => 'bar',
     'baz' => [
         'qux => 'foobar'
     ]
];

array_set( 'baz.qux', 'bazqux', $array );

// (
//     [foo] => bar
//     [baz] => [
//         [qux] => bazqux
//     ]
// )
```

#### Example 2
```php
$array = [
     'foo' => 'bar',
     'baz' => [
         'qux => 'foobar'
     ]
];

array_set( 'baz.foo', 'bar', $array );

// (
//     [foo] => bar
//     [baz] => [
//         [qux] => bazqux
//         [foo] => bar
//     ]
// )
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$key` | **string** | The key to set using dot notation. |
| `$value` | **mixed** | The value to set on the specified key. |
| `$array` | **array** | The concerned array. |


**Return Value:**

True if the new value was successfully set, false otherwise.



---

## Dev

Helper class that provides easy access to useful php functions in conjunction with the user agent.

Class Dev

* Full name: \CNZ\Helpers\Dev


### isSmartphone

Determes if the current device is a smartphone.

```php
Dev::isSmartphone(  ): boolean
```

### is_smartphone
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
is_smartphone(  ): boolean
```

#### Example
```php
if ( is_smartphone() ) {
     // I am a smartphone
}
```

* This method is **static**.

**Return Value:**

True if current visitor uses a smartphone, false otherwise.



---

### isMobile

Detects if the current visitor uses a mobile device (Smartphone/Tablet/Handheld).

```php
Dev::isMobile(  ): boolean
```

### is_mobile
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
is_mobile(  ): boolean
```

#### Example
```php
if ( is_mobile() ) {
     // I am a mobile device (smartphone/tablet or handheld)
}
```

* This method is **static**.

**Return Value:**

True if current visitor uses a mobile device, false otherwise.



---

### mobileDetect

Get a singleton MobileDetect object to call every method it provides.

```php
Dev::mobileDetect(  ): \Detection\MobileDetect
```

Public access for use of outside this class.
Mobile_Detect doku: https://github.com/serbanghita/Mobile-Detect

***This method has no related global function!***
> #### [( jump back )](#available-php-functions)

#### Example
```php
Dev::mobileDetect()->version('Android');

// 8.1
```

* This method is **static**.

**Return Value:**

A singleton MobileDetect object to call every method it provides.



---

### isTablet

Determes if the current visitor uses a tablet device.

```php
Dev::isTablet(  ): boolean
```

### is_tablet
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
is_tablet(  ): boolean
```

#### Example
```php
if ( is_tablet() ) {
     // I am a tablet
}
```

* This method is **static**.

**Return Value:**

True if current visitor uses a tablet device, false otherwise.



---

### isDesktop

Determes if the current visitor uses a desktop computer.

```php
Dev::isDesktop(  ): boolean
```

### is_desktop
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
is_desktop(  ): boolean
```

#### Example
```php
if ( is_desktop() ) {
     // I am a desktop computer (Mac, Linux, Windows)
}
```

* This method is **static**.

**Return Value:**

True if current visitor uses a desktop computer, false otherwise.



---

### isRobot

Determes if the current visitor is a search engine/bot/crawler/spider.

```php
Dev::isRobot(  ): boolean
```

### is_robot
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
is_robot(  ): boolean
```

#### Example
```php
if ( is_robot() ) {
     // I am a robot (search engine, bot, crawler, spider)
}
```

* This method is **static**.

**Return Value:**

True if the current visitor is a search engine/bot/crawler/spider, false otherwise.



---

### crawlerDetect

Get a singleton CrawlerDetect object to call every method it provides.

```php
Dev::crawlerDetect(  ): \Jaybizzle\CrawlerDetect\CrawlerDetect
```

Public access for use of outside this class.
Crawler-Detect doku: https://github.com/JayBizzle/Crawler-Detect

***This method has no related global function!***

> #### [( jump back )](#available-php-functions)

#### Example
```php
Dev::crawlerDetect()->getMatches();

// Output the name of the bot that matched (if any)
```

* This method is **static**.



---

### isAndroid

Determes if the current device is running an Android operating system.

```php
Dev::isAndroid(  ): boolean
```

### is_android
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
is_android(  ): boolean
```

#### Example
```php
if ( is_android() ) {
     // I am an Android based device
}
```

* This method is **static**.

**Return Value:**

True if current visitor uses an Android based device, false otherwise.



---

### isIphone

Determes if the current device is an iPhone.

```php
Dev::isIphone(  ): boolean
```

### is_iphone
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
is_iphone(  ): boolean
```

#### Example
```php
if ( is_iphone() ) {
     // I am an iPhone
}
```

* This method is **static**.

**Return Value:**

True if current visitor uses an iPhone, false otherwise.



---

### isSamsung

Determes if the current device is from Samsung.

```php
Dev::isSamsung(  ): boolean
```

### is_samsung
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
is_samsung(  ): boolean
```

#### Example
```php
if ( is_samsung() ) {
     // I am a device from Samsung
}
```

* This method is **static**.

**Return Value:**

True if current visitor uses a Samsung device, false otherwise.



---

### isIOS

Determes if the current device is running an iOS operating system.

```php
Dev::isIOS(  ): boolean
```

### is_ios
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
is_ios(  ): boolean
```

#### Example
```php
if ( is_ios() ) {
     // I am an iOS based device
}
```

* This method is **static**.

**Return Value:**

True if current visitor uses an iOS device, false otherwise.



---

## Str

Helper class that provides easy access to useful php string functions.

Class Str

* Full name: \CNZ\Helpers\Str


### insert

Inserts one or more strings into another string on a defined position.

```php
Str::insert( array $keyValue, string $string ): string
```

### str_insert
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
str_insert( array $keyValue, string $string ): string
```

#### Example
```php
$keyValue = [
     ':color' => 'brown',
     ':animal' => 'dog'
]
$string = 'The quick :color fox jumps over the lazy :animal.';

str_insert( $keyValue, $string );

// The quick brown fox jumps over the lazy dog.
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$keyValue` | **array** | An associative array with key => value pairs. |
| `$string` | **string** | The text with the strings to be replaced. |


**Return Value:**

The replaced string.



---

### between

Return the content in a string between a left and right element.

```php
Str::between( string $left, string $right, string $string ): array
```

### str_between
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
str_between( string $left, string $right, string $string ): array
```

#### Example
```php
$string = '<tag>foo</tag>foobar<tag>bar</tag>'

str_between( '<tag>', '</tag>' $string );

// (
//     [0] => foo
//     [1] => bar
// )
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$left` | **string** | The left element of the string to search. |
| `$right` | **string** | The right element of the string to search. |
| `$string` | **string** | The string to search in. |


**Return Value:**

A result array with all matches of the search.



---

### after

Return the part of a string after a given value.

```php
Str::after( string $search, string $string ): string
```

### str_after
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
str_after( string $search, string $string ): string
```

#### Example
```php
$string = 'The quick brown fox jumps over the lazy dog';

str_after( 'fox' $string );

// jumps over the lazy dog
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$search` | **string** | The string to search for. |
| `$string` | **string** | The string to search in. |


**Return Value:**

The found string after the search string. Whitespaces at beginning will be removed.



---

### before

Get the part of a string before a given value.

```php
Str::before( string $search, string $string ): string
```

### str_before
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
str_before( string $search, string $string ): string
```

#### Example
```php
$string = 'The quick brown fox jumps over the lazy dog';

str_before( 'fox' $string );

// The quick brown
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$search` | **string** | The string to search for. |
| `$string` | **string** | The string to search in. |


**Return Value:**

The found string before the search string. Whitespaces at end will be removed.



---

### limitWords

Limit the number of words in a string. Put value of $end to the string end.

```php
Str::limitWords( string $string, integer $limit = 10, string $end = '...' ): string
```

### str_limit_words
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
str_limit_words( string $string, int $limit = 10, string $end = '...' ): string
```

#### Example
```php
$string = 'The quick brown fox jumps over the lazy dog';

str_limit_words( $string, 3 );

// The quick brown...
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** | The string to limit the words. |
| `$limit` | **integer** | The number of words to limit. Defaults to 10. |
| `$end` | **string** | The string to end the cut string. Defaults to '...' |


**Return Value:**

The limited string with $end at the end.



---

### limit

Limit the number of characters in a string. Put value of $end to the string end.

```php
Str::limit( string $string, integer $limit = 100, string $end = '...' ): string
```

### str_limit
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
str_limit( string $string, int $limit = 100, string $end = '...' ): string
```

#### Example
```php
$string = 'The quick brown fox jumps over the lazy dog';

str_limit( $string, 15 );

// The quick brown...
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** | The string to limit the characters. |
| `$limit` | **integer** | The number of characters to limit. Defaults to 100. |
| `$end` | **string** | The string to end the cut string. Defaults to '...' |


**Return Value:**

The limited string with $end at the end.



---

### contains

Tests if a string contains a given element

```php
Str::contains( string|array $needle, string $haystack ): boolean
```

### str_contains
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
str_contains( string|array $needle, string $haystack ): boolean
```

#### Example
```php
$string = 'The quick brown fox jumps over the lazy dog';
$array = [
     'cat',
     'fox'
];

str_contains( $array, $string );

// bool(true)
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$needle` | **string&#124;array** | A string or an array of strings. |
| `$haystack` | **string** | The string to search in. |


**Return Value:**

True if $needle is found, false otherwise.



---

### containsIgnoreCase

Tests if a string contains a given element. Ignore case sensitivity.

```php
Str::containsIgnoreCase( string|array $needle, string $haystack ): boolean
```

### str_icontains
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
str_icontains( string|array $needle, string $haystack ): boolean
```

#### Example
```php
$string = 'The quick brown fox jumps over the lazy dog';
$array = [
     'Cat',
     'Fox'
];

str_icontains( $array, $string );

// bool(true)
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$needle` | **string&#124;array** | A string or an array of strings. |
| `$haystack` | **string** | The string to search in. |


**Return Value:**

True if $needle is found, false otherwise.



---

### startsWith

Determine if a given string starts with a given substring.

```php
Str::startsWith( string|array $needle, string $haystack ): boolean
```

### str_starts_with
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
str_starts_with( string|array $needle, string $haystack ): boolean
```

#### Example
```php
$string = 'The quick brown fox jumps over the lazy dog';
$array = [
     'Cat',
     'The'
];

str_starts_with( $array, $string );

// bool(true)
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$needle` | **string&#124;array** | The string or array of strings to search for. |
| `$haystack` | **string** | The string to search in. |


**Return Value:**

True if $needle was found, false otherwise.



---

### startsWithIgnoreCase

Determine if a given string starts with a given substring. Ignore case sensitivity.

```php
Str::startsWithIgnoreCase( string|array $needle, string $haystack ): boolean
```

### str_istarts_with
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
str_istarts_with( string|array $needle, string $haystack ): boolean
```

#### Example
```php
$string = 'The quick brown fox jumps over the lazy dog';
$array = [
     'cat',
     'the'
];

str_istarts_with( $array, $string );

// bool(true)
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$needle` | **string&#124;array** | The string or array of strings to search for. |
| `$haystack` | **string** | The string to search in. |


**Return Value:**

True if $needle was found, false otherwise.



---

### endsWith

Determine if a given string ends with a given substring.

```php
Str::endsWith( string|array $needle, string $haystack ): boolean
```

### str_ends_with
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
str_ends_with( string|array $needle, string $haystack ): boolean
```

#### Example
```php
$string = 'The quick brown fox jumps over the lazy dog';
$array = [
     'cat',
     'dog'
];

str_ends_with( $array, $string );

// bool(true)
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$needle` | **string&#124;array** | The string or array of strings to search for. |
| `$haystack` | **string** | The string to search in. |


**Return Value:**

True if $needle was found, false otherwise.



---

### endsWithIgnoreCase

Determine if a given string ends with a given substring.

```php
Str::endsWithIgnoreCase( string|array $needle, string $haystack ): boolean
```

### str_iends_with
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
str_iends_with( string|array $needle, string $haystack ): boolean
```

#### Example
```php
$string = 'The quick brown fox jumps over the lazy dog';
$array = [
     'Cat',
     'Dog'
];

str_iends_with( $array, $string );

// bool(true)
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$needle` | **string&#124;array** | The string or array of strings to search for. |
| `$haystack` | **string** | The string to search in. |


**Return Value:**

True if $needle was found, false otherwise.



---

### afterLast

Return the part of a string after the last occurrence of a given search value.

```php
Str::afterLast( string $search, string $string ): string
```

### str_after_last
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
str_after_last( string $search, string $string ): string
```

#### Example
```php
$path = "/var/www/html/public/img/image.jpg";

str_after_last( '/' $path );

// image.jpg
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$search` | **string** | The string to search for. |
| `$string` | **string** | The string to search in. |


**Return Value:**

The found string after the last occurrence of the search string. Whitespaces at beginning will be removed.



---

## Util

Helper class that provides easy access to useful common php functions.

Class Util

* Full name: \CNZ\Helpers\Util


### isEmail

Validate a given email address.

```php
Util::isEmail( string $email ): boolean
```

### is_email
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
is_email( string $email ): boolean
```

#### Example
```php
$email = 'foobar@example.com';

is_email( $email );

// bool(true)
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$email` | **string** | The email address to test. |


**Return Value:**

True if given string is a valid email address, false otherwise.



---

### ip

Get the current ip address of the user.

```php
Util::ip(  ): string|null
```

### user_ip
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
ip(  ): null|string
```

#### Example
```php
echo ip();

// 127.0.0.1
```

* This method is **static**.

**Return Value:**

The detected ip address, null if the ip was not detected.



---

### cryptPassword

Creates a secure hash from a given password. Uses the CRYPT_BLOWFISH algorithm.

```php
Util::cryptPassword( string $password ): string
```

Note: 255 characters for database column recommended!

### crypt_password
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
crypt_password( string $password ): string
```

#### Example
```php
$password = 'foobar';

crypt_password( $password );

// $2y$10$6qKwbwTgwQNcmcaw04eSf.QpP3.4T0..bEnY62dd1ozM8L61nb8AC
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$password` | **string** | The password to crypt. |


**Return Value:**

The crypted password.



---

### isPassword

Verifies that a password matches a crypted password (CRYPT_BLOWFISH algorithm).

```php
Util::isPassword( string $password, string $cryptedPassword ): boolean
```

### is_password
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
is_password( string $password, string $cryptedPassword ): boolean
```

#### Example
```php
$password = 'foobar';
$cryptedPassword = '$2y$10$6qKwbwTgwQNcmcaw04eSf.QpP3.4T0..bEnY62dd1ozM8L61nb8AC';

is_password( $password, $cryptedPassword );

// bool(true)
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$password` | **string** | The password to test. |
| `$cryptedPassword` | **string** | The crypted password (e.g. stored in the database). |




---

### dd

Dumps the content of the given variable and exits the script.

```php
Util::dd( mixed $var )
```

### dd
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
dd( mixed $var )
```

#### Example
```php
$array = [
     'foo' => 'bar',
     'baz' => 'qux'
];

dd( $array );

// (
//     [foo] => bar
//     [baz] => qux
// )
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$var` | **mixed** | The var to dump. |




---

### dump

Dumps the content of the given variable. Script does NOT stop after call.

```php
Util::dump( mixed $var )
```

### dump
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
dump( mixed $var )
```

#### Example
```php
$array = [
     'foo' => 'bar',
     'baz' => 'qux'
];

dump( $array );

// (
//     [foo] => bar
//     [baz] => qux
// )
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$var` | **mixed** | The var to dump. |




---

## Yml

Helper class that provides easy access to useful php yml functions.

Class Yml

* Full name: \CNZ\Helpers\Yml


### isValidFile

Validates if a given file contains yaml syntax.

```php
Yml::isValidFile( string $file ): boolean
```

### is_yml_file
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
is_yml_file( string $file ): boolean
```

#### Example
```php
$file = /path/to/file.yml

is_yml_file( $file );

// bool(true)
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$file` | **string** | The file to test for yaml syntax. |


**Return Value:**

True if the file contains yaml syntax, false otherwise.



---

### isValid

Tests if the syntax of a given string is yaml.

```php
Yml::isValid( string $string ): boolean
```

### is_yml
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
is_yml( string $string ): boolean
```

#### Example
```php
$string = "
     foo: bar
     baz: qux
     foobar:
         foo: bar
";

is_yml( $string );

// bool(true)
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** | The string to test for yaml syntax. |


**Return Value:**

True if the string is yaml, false otherwise.



---

### parse

Transforms a given yaml string into an array.

```php
Yml::parse( string $yml ): array|null
```

### yml_parse
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
yml_parse( string $yml ): array|null
```

#### Example
```php
$yml = "
     foo: bar
     baz: qux
     foobar:
         foo: bar
";

yml_parse( $yml );

// (
//       [foo] => bar
//       [baz] => qux
//       [foobar] => (
//           [foo] => bar
//       )
// )
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$yml` | **string** | The yaml string to parse. |


**Return Value:**

The transformed array, null on error.



---

### get

Gets a value in a yaml string using the dot notation.

```php
Yml::get( string $key, string $yml ): mixed
```

### yml_get
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
yml_get( string $key, string $yml ): mixed
```

#### Example
```php
$yml = "
     foo: bar
     baz: qux
     foobar:
         foo: bar
";

yml_get( 'foobar.foo', $yml );

// bar
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$key` | **string** | The key to search using dot notation (e.g. 'foo.bar.baz'). |
| `$yml` | **string** | The yml string to search in. |


**Return Value:**

The found value, null otherwise.



---

### getFile

Gets a value in a yaml file using the dot notation.

```php
Yml::getFile( string $key, string $ymlfile ): mixed
```

### yml_get_file
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
yml_get_file( string $key, string $ymlfile ): mixed
```

#### Example
```php
$ymlfile = '/path/to/file.yml';

yml_get_file( 'foobar.foo', $ymlfile );

// bar
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$key` | **string** | The key to search using dot notation (e.g. 'foo.bar.baz'). |
| `$ymlfile` | **string** | The ymlfile to search in. |


**Return Value:**

The found value, null otherwise.



---

### parseFile

Loads the content of a yamlfile into an array.

```php
Yml::parseFile( string $ymlfile ): array
```

### yml_parse_file
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
yml_parse_file( string $ymlfile ): array|null
```

#### Example
```php
$ymlfile = '/path/to/file.yml';

yml_parse_file( $ymlfile );

// (
//       [foo] => bar
//       [baz] => qux
//       [foobar] => (
//           [foo] => bar
//       )
// )
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$ymlfile` | **string** | The path of the file to read from. |


**Return Value:**

The parsed array.



---

### setFile

Sets a value in a yamlfile using the dot notation. Note: all comments in the file will be removed!

```php
Yml::setFile( string $key, mixed $value, string $ymlfile ): boolean
```

### yml_set_file
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
yml_set_file( string $key, mixed $value, string $ymlfile ): boolean
```

#### Example
```php
$ymlfile = '/path/to/file.yml';

yml_set_file( 'foobar.foo', 'baz', $ymlfile );

//   foo: bar
//   baz: qux
//   foobar:
//       foo: baz
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$key` | **string** | The string to search with dot notation |
| `$value` | **mixed** | The value to set on the specified key. |
| `$ymlfile` | **string** | The ymlfile to set the value in. |


**Return Value:**

True if value was successfully set in yamlfile, false otherwise.



---

### dumpFile

Transformes a given array to yaml syntax and puts its content into a given file. Note: if the file exists, it will be overwritten!

```php
Yml::dumpFile( array|object $var, string $filename, integer $indent = 2, integer $wordwrap, boolean $openingDashes = false ): boolean
```

### to_yml_file
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
to_yml_file( array|object $var, string $filename, int $indent = 2, int $wordwrap = 0, bool $openingDashes = false ): boolean
```

#### Example
```php
$array = [
     'foo' => 'bar',
     'baz' => 'qux'
];

to_yml_file( $array, '/path/to/file.yml' );

//   foo: bar
//   baz: qux
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$var` | **array&#124;object** | The array or object to transform. |
| `$filename` | **string** | The path to the file to write the yaml string into. Note: if the file already exists, it will be overwritten! |
| `$indent` | **integer** | The indent of the converted yaml. Defaults to 2. |
| `$wordwrap` | **integer** | After the given number a string will be wraped. Default to 0 (no wordwrap). |
| `$openingDashes` | **boolean** | True if the yaml string should start with opening dashes. Defaults to false. |


**Return Value:**

True on success, false otherwise.



---

### dump

Transformes a given array or object to a yaml string.

```php
Yml::dump( array|object $var, integer $indent = 2, integer $wordwrap, boolean $openingDashes = false ): string|null
```

### to_yml
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
to_yml( array|object $array, string $filename, int $indent = 2, int $wordwrap = 0, bool $openingDashes = false ): string|null
```

#### Example
```php
$array = [
     'foo' => 'bar',
     'baz' => 'qux',
     'foobar' => [
         'foo' => 'bar'
     ]
];

to_yml( $array );

//   foo: bar
//   baz: qux
//   foobar:
//     foo: bar
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$var` | **array&#124;object** | The array or object to transform. |
| `$indent` | **integer** | The indent of the converted yaml. Defaults to 2. |
| `$wordwrap` | **integer** | After the given number a string will be wraped. Default to 0 (no wordwrap). |
| `$openingDashes` | **boolean** | True if the yaml string should start with opening dashes. Defaults to false. |


**Return Value:**

The converted yaml string. On errors, null is returned.



---

### set

Sets a value in a yaml string using the dot notation.

```php
Yml::set( string $key, mixed $value, string &$yml ): boolean
```

### yml_set
Related global function (description see above).

> #### [( jump back )](#available-php-functions)

```php
yml_set( string $key, mixed $value, string &$yml ): boolean
```

#### Example
```php
$yml = "
     foo: bar
     baz: qux
     foobar:
         foo: bar
";

yml_set( 'foobar.foo', 'baz', $yml );

//   foo: bar
//   baz: qux
//   foobar:
//       foo: baz
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$key` | **string** | The string to search with dot notation |
| `$value` | **mixed** | The value to set on the specified key. |
| `$yml` | **string** | The yml string to search in. Note: all comments in the string will be removed! |


**Return Value:**

True if value was successfully set, false otherwise.



---



--------
> This document was automatically generated from source code comments on 2018-01-22 using [phpDocumentor](http://www.phpdoc.org/) and [cvuorinen/phpdoc-markdown-public](https://github.com/cvuorinen/phpdoc-markdown-public)
