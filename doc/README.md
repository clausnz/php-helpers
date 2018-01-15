# Available PHP Functions

## Table of Contents

* [User](#is_mobile)
    * [is_mobile](#is_mobile)
    * [is_touch_device](#is_touch_device)
    * [is_smartphone](#is_smartphone)
    * [is_tablet](#is_tablet)
    * [is_desktop](#is_desktop)
    * [is_robot](#is_robot)
    * [is_ios](#is_ios)
    * [is_android](#is_android)
    * [is_iphone](#is_iphone)
    * [is_samsung](#is_samsung)
* [Array](#array_first)
    * [array_first](#array_first)
    * [array_last](#array_last)
    * [to_array](#to_array)
    * [to_object](#to_object)
    * [is_assoc](#is_assoc)
* [String](#str_before)
    * [str_before](#str_before)
    * [str_after](#str_after)
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
* [Utils](#is_email)
    * [is_email](#is_email)
    * [crypt_password](#crypt_password)
    * [is_password](#is_password)
    * [ip](#ip)
    * [dump](#dump)
    * [dd](#dd)
# API Documentation

## Table of Contents

* [Arr](#arr)
    * [isAssoc](#isassoc)
    * [toObject](#toobject)
    * [toArray](#toarray)
    * [first](#first)
    * [last](#last)
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
* [User](#user)
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
    * [isTouchDevice](#istouchdevice)
* [Util](#util)
    * [isEmail](#isemail)
    * [ip](#ip)
    * [cryptPassword](#cryptpassword)
    * [isPassword](#ispassword)
    * [dd](#dd)
    * [dump](#dump)

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
#### [( jump back )](#available-php-functions)
```php
is_assoc( array $array ): boolean
```
#### Example
```php
$array = [
    'foo' => 'bar'
];

echo is_assoc($array) ? 'true' : 'false';

// true
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
Arr::toObject( array $array ): object
```

### to_object
Related global function (description see above).
#### [( jump back )](#available-php-functions)
```php
to_object( array $array ): object
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

### toArray

Converts an object to an array.

```php
Arr::toArray( object $object ): array
```

### to_array
Related global function (description see above).
#### [( jump back )](#available-php-functions)
```php
to_array( object $object ): array
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$object` | **object** | The object to be converted. |


**Return Value:**

An array representation of the converted object.



---

### first

Returns the first element of an array.

```php
Arr::first( array $array ): mixed
```

### array_first
Related global function (description see above).
#### [( jump back )](#available-php-functions)
```php
array_first( array $array ): mixed
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** | The concerned array. |


**Return Value:**

The value of the first element. Type could be anything.



---

### last

Returns the last element of an array.

```php
Arr::last( array $array ): mixed
```

### array_last
Related global function (description see above).
#### [( jump back )](#available-php-functions)
```php
array_last( array $array ): mixed
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** | The concerned array. |


**Return Value:**

The value of the last element. Type could be anything.



---

## Str

Helper class that provides easy access to useful php string functions.

Class Str

* Full name: \CNZ\Helpers\Str


### insert

Inserts one or more strings into another string on a defined position.

```php
Str::insert( array $inserts, string $string ): string
```

### str_insert
Related global function (description see above).
#### [( jump back )](#available-php-functions)
```php
str_insert( $string, $inserts ): array
```
#### Example
```php
$name = 'John';
$age = 25;
$string = 'His name is :name. :name is :age years old.';

echo str_insert([':name' => $name, ':age' => $age], $string);

// His name is John. John is 25 years old.
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$inserts` | **array** |  |
| `$string` | **string** |  |




---

### between

Return the content in a string between a left and right element.

```php
Str::between( string $left, string $right, string $string ): array
```

### str_between
Related global function (description see above).
#### [( jump back )](#available-php-functions)
```php
str_between( string $left, string $right, string $string ): array
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$left` | **string** |  |
| `$right` | **string** |  |
| `$string` | **string** |  |




---

### after

Return the remainder of a string after a given value.

```php
Str::after( string $search, string $string ): string
```

### str_after
Related global function (description see above).
#### [( jump back )](#available-php-functions)
```php
str_after( string $search, string $string ): string
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$search` | **string** |  |
| `$string` | **string** |  |




---

### before

Get the portion of a string before a given value.

```php
Str::before( string $search, string $string ): string
```

### str_before
Related global function (description see above).
#### [( jump back )](#available-php-functions)
```php
str_before( string $search, string $string ): string
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$search` | **string** |  |
| `$string` | **string** |  |




---

### limitWords

Limit the number of words in a string. Put value of $end to the string end.

```php
Str::limitWords( string $string, integer $limit = 10, string $end = '...' ): string
```

### str_limit_words
Related global function (description see above).
#### [( jump back )](#available-php-functions)
```php
str_limit_words( string $string, int $limit = 10, string $end = '...' ): string
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$limit` | **integer** |  |
| `$end` | **string** |  |




---

### limit

Limit the number of characters in a string. Put value of $end to the string end.

```php
Str::limit( string $string, integer $limit = 100, string $end = '...' ): string
```

### str_limit
Related global function (description see above).
#### [( jump back )](#available-php-functions)
```php
str_limit( string $string, int $limit = 100, string $end = '...' ): string
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$limit` | **integer** |  |
| `$end` | **string** |  |




---

### contains

Tests if a string contains a given element

```php
Str::contains( string|array $needle, string $haystack ): boolean
```

### str_contains
Related global function (description see above).
#### [( jump back )](#available-php-functions)
```php
str_contains( string|array $needle, string $haystack ): boolean
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$needle` | **string&#124;array** |  |
| `$haystack` | **string** |  |




---

### containsIgnoreCase

Tests if a string contains a given element. Ignore case sensitivity.

```php
Str::containsIgnoreCase( string|array $needle, string $haystack ): boolean
```

### str_icontains
Related global function (description see above).
#### [( jump back )](#available-php-functions)
```php
str_icontains( string|array $needle, string $haystack ): boolean
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$needle` | **string&#124;array** |  |
| `$haystack` | **string** |  |




---

### startsWith

Determine if a given string starts with a given substring.

```php
Str::startsWith( string|array $needle, string $haystack ): boolean
```

### str_starts_with
Related global function (description see above).
#### [( jump back )](#available-php-functions)
```php
str_starts_with( string|array $needle, string $haystack ): boolean
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$needle` | **string&#124;array** |  |
| `$haystack` | **string** |  |




---

### startsWithIgnoreCase

Determine if a given string starts with a given substring. Ignore case sensitivity.

```php
Str::startsWithIgnoreCase( string|array $needle, string $haystack ): boolean
```

### str_istarts_with
Related global function (description see above).
#### [( jump back )](#available-php-functions)
```php
str_istarts_with( string|array $needle, string $haystack ): boolean
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$needle` | **string&#124;array** |  |
| `$haystack` | **string** |  |




---

### endsWith

Determine if a given string ends with a given substring.

```php
Str::endsWith( string|array $needle, string $haystack ): boolean
```

### str_ends_with
Related global function (description see above).
#### [( jump back )](#available-php-functions)
```php
str_ends_with( string|array $needle, string $haystack ): boolean
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$needle` | **string&#124;array** |  |
| `$haystack` | **string** |  |




---

### endsWithIgnoreCase

Determine if a given string ends with a given substring.

```php
Str::endsWithIgnoreCase( string|array $needle, string $haystack ): boolean
```

### str_iends_with
Related global function (description see above).
#### [( jump back )](#available-php-functions)
```php
str_iends_with( string|array $needle, string $haystack ): boolean
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$needle` | **string&#124;array** |  |
| `$haystack` | **string** |  |




---

## User

Helper class that provides easy access to useful php functions in conjunction with the user agent.

Class User

* Full name: \CNZ\Helpers\User


### isSmartphone

Determes if the current user agent is running on a smartphone.

```php
User::isSmartphone( string $userAgent = null ): boolean
```

### is_smartphone
Related global function (description see above).
#### [( jump back )](#available-php-functions)
```php
is_smartphone( string $userAgent = null ): boolean
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$userAgent` | **string** | The User Agent to be analyzed. By default, the value of HTTP User-Agent header is used. |


**Return Value:**

True if current visitor uses a smartphone, false otherwise.



---

### isMobile

Detects if the current user agent is running on a mobile device.

```php
User::isMobile( string $userAgent = null ): boolean
```

### is_mobile
Related global function (description see above).
#### [( jump back )](#available-php-functions)
```php
is_mobile( string $userAgent = null ): boolean
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$userAgent` | **string** | The User Agent to be analyzed. By default, the value of HTTP User-Agent header is used. |


**Return Value:**

True if current visitor uses a mobile device, false otherwise.



---

### mobileDetect

Get a singleton Mobile_Detect object to call every method it provides.

```php
User::mobileDetect(  ): \Mobile_Detect
```

Public access for use of outside this class.
Mobile_Detect doku: https://github.com/serbanghita/Mobile-Detect

***This method has no related global function!***
#### [( jump back )](#available-php-functions)

* This method is **static**.



---

### isTablet

Determes if the current user agent is a tablet device.

```php
User::isTablet( string $userAgent = null ): boolean
```

### is_tablet
Related global function (description see above).
#### [( jump back )](#available-php-functions)
```php
is_tablet( string $userAgent = null ): boolean
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$userAgent` | **string** | The User Agent to be analyzed. By default, the value of HTTP User-Agent header is used. |


**Return Value:**

True if current visitor uses a tablet device, false otherwise.



---

### isDesktop

Determes if the current user agent is a desktop computer.

```php
User::isDesktop( string $userAgent = null ): boolean
```

### is_desktop
Related global function (description see above).
#### [( jump back )](#available-php-functions)
```php
is_desktop( string $userAgent = null ): boolean
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$userAgent` | **string** | The User Agent to be analyzed. By default, the value of HTTP User-Agent header is used. |


**Return Value:**

True if current visitor uses a desktop computer, false otherwise.



---

### isRobot

Determes if the current visitor is a bot/crawler/spider.

```php
User::isRobot( string $userAgent = null ): boolean
```

### is_robot
Related global function (description see above).
#### [( jump back )](#available-php-functions)
```php
is_robot( string $userAgent = null ): boolean
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$userAgent` | **string** |  |




---

### crawlerDetect

Get a singleton CrawlerDetect object to call every method it provides.

```php
User::crawlerDetect(  ): \Jaybizzle\CrawlerDetect\CrawlerDetect
```

Public access for use of outside this class.
Crawler-Detect doku: https://github.com/JayBizzle/Crawler-Detect

***This method has no related global function!***
#### [( jump back )](#available-php-functions)

* This method is **static**.



---

### isAndroid

Determes if the current user agent is running on an Android device.

```php
User::isAndroid( string $userAgent = null ): boolean
```

### is_android
Related global function (description see above).
#### [( jump back )](#available-php-functions)
```php
is_android( string $userAgent = null ): boolean
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$userAgent` | **string** | The User Agent to be analyzed. By default, the value of HTTP User-Agent header is used. |


**Return Value:**

True if current visitor uses an Android based device, false otherwise.



---

### isIphone

Determes if the current user agent is running on an iPhone device.

```php
User::isIphone( string $userAgent = null ): boolean
```

### is_iphone
Related global function (description see above).
#### [( jump back )](#available-php-functions)
```php
is_iphone( string $userAgent = null ): boolean
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$userAgent` | **string** | The User Agent to be analyzed. By default, the value of HTTP User-Agent header is used. |


**Return Value:**

True if current visitor uses an iPhone, false otherwise.



---

### isSamsung

Determes if the current user agent is running on a Samsung device.

```php
User::isSamsung( string $userAgent = null ): boolean
```

### is_samsung
Related global function (description see above).
#### [( jump back )](#available-php-functions)
```php
is_samsung( string $userAgent = null ): boolean
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$userAgent` | **string** | The User Agent to be analyzed. By default, the value of HTTP User-Agent header is used. |


**Return Value:**

True if current visitor uses a Samsung device, false otherwise.



---

### isIOS

Determes if the current user agent is running on an iOS operating system.

```php
User::isIOS( string $userAgent = null ): boolean
```

### is_ios
Related global function (description see above).
#### [( jump back )](#available-php-functions)
```php
is_ios( string $userAgent = null ): boolean
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$userAgent` | **string** | The User Agent to be analyzed. By default, the value of HTTP User-Agent header is used. |


**Return Value:**

True if current visitor uses an iOS device, false otherwise.



---

### isTouchDevice

Determes if the current user agent is running on a mobile touch device.

```php
User::isTouchDevice( string $userAgent = null ): boolean
```

### is_touch_device
Related global function (description see above).
#### [( jump back )](#available-php-functions)
```php
is_touch_device( string $userAgent = null ): boolean
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$userAgent` | **string** | The User Agent to be analyzed. By default, the value of HTTP User-Agent header is used. |


**Return Value:**

True if current visitor uses a touch device, false otherwise.



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
#### [( jump back )](#available-php-functions)
```php
is_email( string $email ): boolean
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$email` | **string** |  |




---

### ip

Get the current ip address of the user.

```php
Util::ip( boolean $cli = false ): null|string
```

### user_ip
Related global function (description see above).
#### [( jump back )](#available-php-functions)
```php
user_ip(  ): null|string
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$cli` | **boolean** |  |




---

### cryptPassword

Creates a secure hash from a given password. Uses the CRYPT_BLOWFISH algorithm.

```php
Util::cryptPassword( string $password ): string
```

Note: 255 characters for database column recommended!

### crypt_password
Related global function (description see above).
#### [( jump back )](#available-php-functions)
```php
crypt_password( string $password ): string
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$password` | **string** |  |




---

### isPassword

Verifies that a password matches a crypted password (CRYPT_BLOWFISH algorithm).

```php
Util::isPassword( string $password, string $cryptedPassword ): boolean
```

### is_password
Related global function (description see above).
#### [( jump back )](#available-php-functions)
```php
is_password( string $password, string $cryptedPassword ): boolean
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$password` | **string** |  |
| `$cryptedPassword` | **string** |  |




---

### dd

Dumps the content of the given variable and exits the script.

```php
Util::dd( mixed $var )
```

### dd
Related global function (description see above).
#### [( jump back )](#available-php-functions)
```php
dd( mixed $var )
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$var` | **mixed** |  |




---

### dump

Dumps the content of the given variable.

```php
Util::dump( mixed $var )
```

### dump
Related global function (description see above).
#### [( jump back )](#available-php-functions)
```php
dump( mixed $var )
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$var` | **mixed** |  |




---



--------
> This document was automatically generated from source code comments on 2018-01-15 using [phpDocumentor](http://www.phpdoc.org/) and [cvuorinen/phpdoc-markdown-public](https://github.com/cvuorinen/phpdoc-markdown-public)
