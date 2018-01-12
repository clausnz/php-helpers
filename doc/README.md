# API Documentation

## Table of Contents

* [ArrayHelpers](#arrayhelpers)
    * [isAssoc](#isassoc)
    * [toObject](#toobject)
    * [toArray](#toarray)
    * [first](#first)
    * [last](#last)
* [CommonHelpers](#commonhelpers)
    * [dd](#dd)
    * [dump](#dump)
* [MobileHelpers](#mobilehelpers)
    * [isSmartphone](#issmartphone)
    * [isMobile](#ismobile)
    * [mobileDetect](#mobiledetect)
    * [isTablet](#istablet)
    * [isDesktop](#isdesktop)
    * [isAndroid](#isandroid)
    * [isIphone](#isiphone)
    * [isSamsung](#issamsung)
    * [isIOS](#isios)
    * [isTouchDevice](#istouchdevice)
* [StringHelpers](#stringhelpers)
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
* [UserHelpers](#userhelpers)
    * [ip](#ip)

## ArrayHelpers

Helper class that provides easy access to useful php array functions.

Class ArrayHelpers

* Full name: \CNZ\Helpers\ArrayHelpers


### isAssoc

Detects if the given value is an associative array.

```php
ArrayHelpers::isAssoc( array $array ): boolean
```

### is_assoc
Related global function.
```php
is_assoc( array $array ): boolean
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
ArrayHelpers::toObject( array $array ): object
```

### to_object
Related global function.
```php
to_object( array $array ): object
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
ArrayHelpers::toArray( object $object ): array
```

### to_array
Related global function.
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
ArrayHelpers::first( array $array ): mixed
```

### array_first
Related global function.
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
ArrayHelpers::last( array $array ): mixed
```

### array_last
Related global function.
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

## CommonHelpers

Helper class that provides easy access to useful common php functions.

Class CommonHelpers

* Full name: \CNZ\Helpers\CommonHelpers


### dd

Dumps the content of the given variable and exits the script.

```php
CommonHelpers::dd( mixed $var )
```

### dd
Related global function.
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
CommonHelpers::dump( mixed $var )
```

### dump
Related global function.
```php
dump( mixed $var )
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$var` | **mixed** |  |




---

## MobileHelpers

Helper class that provides easy access to useful php functions in conjunction with mobile devices.

Class MobileHelpers

* Full name: \CNZ\Helpers\MobileHelpers


### isSmartphone

Determes if the current user agent is running on a smartphone.

```php
MobileHelpers::isSmartphone( string $userAgent = null ): boolean
```

### is_smartphone
Related global function.
```php
is_smartphone( string $userAgent = null ): boolean
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$userAgent` | **string** | If $userAgent is not set, $_SERVER ['HTTP_USER_AGENT'] will be used. |


**Return Value:**

True if current visitor uses a smartphone, false otherwise.



---

### isMobile

Detects if the current user agent is running on a mobile device.

```php
MobileHelpers::isMobile( string $userAgent = null ): boolean
```

### is_mobile
Related global function.
```php
is_mobile( string $userAgent = null ): boolean
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$userAgent` | **string** | If $userAgent is not set, $_SERVER ['HTTP_USER_AGENT'] will be used. |


**Return Value:**

True if current visitor uses a mobile device, false otherwise.



---

### mobileDetect

Get a singleton Mobile_Detect object to call every method it provides.

```php
MobileHelpers::mobileDetect(  ): \Mobile_Detect
```

Public access for use of outside this class.
Mobile_Detect doku: https://github.com/serbanghita/Mobile-Detect

***This method has no related global function!***

* This method is **static**.



---

### isTablet

Determes if the current user agent is a tablet device.

```php
MobileHelpers::isTablet( string $userAgent = null ): boolean
```

### is_tablet
Related global function.
```php
is_tablet( string $userAgent = null ): boolean
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$userAgent` | **string** | If $userAgent is not set, $_SERVER ['HTTP_USER_AGENT'] will be used. |


**Return Value:**

True if current visitor uses a tablet device, false otherwise.



---

### isDesktop

Determes if the current user agent is a desktop computer.

```php
MobileHelpers::isDesktop( string $userAgent = null ): boolean
```

### is_desktop
Related global function.
```php
is_desktop( string $userAgent = null ): boolean
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$userAgent` | **string** | If $userAgent is not set, $_SERVER ['HTTP_USER_AGENT'] will be used. |


**Return Value:**

True if current visitor uses a desktop computer, false otherwise.



---

### isAndroid

Determes if the current user agent is running on an Android device.

```php
MobileHelpers::isAndroid( string $userAgent = null ): boolean
```

### is_android
Related global function.
```php
is_android( string $userAgent = null ): boolean
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$userAgent` | **string** | If $userAgent is not set, $_SERVER ['HTTP_USER_AGENT'] will be used. |


**Return Value:**

True if current visitor uses an Android based device, false otherwise.



---

### isIphone

Determes if the current user agent is running on an iPhone device.

```php
MobileHelpers::isIphone( string $userAgent = null ): boolean
```

### is_iphone
Related global function.
```php
is_iphone( string $userAgent = null ): boolean
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$userAgent` | **string** | If $userAgent is not set, $_SERVER ['HTTP_USER_AGENT'] will be used. |


**Return Value:**

True if current visitor uses an iPhone, false otherwise.



---

### isSamsung

Determes if the current user agent is running on a Samsung device.

```php
MobileHelpers::isSamsung( string $userAgent = null ): boolean
```

### is_samsung
Related global function.
```php
is_samsung( string $userAgent = null ): boolean
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$userAgent` | **string** | If $userAgent is not set, $_SERVER ['HTTP_USER_AGENT'] will be used. |


**Return Value:**

True if current visitor uses a Samsung device, false otherwise.



---

### isIOS

Determes if the current user agent is running on an iOS operating system.

```php
MobileHelpers::isIOS( string $userAgent = null ): boolean
```

### is_ios
Related global function.
```php
is_ios( string $userAgent = null ): boolean
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$userAgent` | **string** | If $userAgent is not set, $_SERVER ['HTTP_USER_AGENT'] will be used. |


**Return Value:**

True if current visitor uses an iOS device, false otherwise.



---

### isTouchDevice

Determes if the current user agent is running on a mobile touch device.

```php
MobileHelpers::isTouchDevice( string $userAgent = null ): boolean
```

### is_touch_device
Related global function.
```php
is_touch_device( string $userAgent = null ): boolean
```

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$userAgent` | **string** | If $userAgent is not set, $_SERVER ['HTTP_USER_AGENT'] will be used. |


**Return Value:**

True if current visitor uses a touch device, false otherwise.



---

## StringHelpers

Helper class that provides easy access to useful php string functions.

Class StringHelpers

* Full name: \CNZ\Helpers\StringHelpers


### after

Return the remainder of a string after a given value.

```php
StringHelpers::after( string $search, string $string ): string
```

### str_after
Related global function.
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
StringHelpers::before( string $search, string $string ): string
```

### str_before
Related global function.
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
StringHelpers::limitWords( string $string, integer $limit = 10, string $end = &#039;...&#039; ): string
```

### str_limit_words
Related global function.
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
StringHelpers::limit( string $string, integer $limit = 100, string $end = &#039;...&#039; ): string
```

### str_limit
Related global function.
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
StringHelpers::contains( string|array $needle, string $haystack ): boolean
```

### str_contains
Related global function.
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
StringHelpers::containsIgnoreCase( string|array $needle, string $haystack ): boolean
```

### str_icontains
Related global function.
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
StringHelpers::startsWith( string|array $needle, string $haystack ): boolean
```

### str_starts_with
Related global function.
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
StringHelpers::startsWithIgnoreCase( string|array $needle, string $haystack ): boolean
```

### str_istarts_with
Related global function.
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
StringHelpers::endsWith( string|array $needle, string $haystack ): boolean
```

### str_ends_with
Related global function.
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
StringHelpers::endsWithIgnoreCase( string|array $needle, string $haystack ): boolean
```

### str_iends_with
Related global function.
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

## UserHelpers

Helper class that provides easy access to useful php user functions.

Class UserHelpers

* Full name: \CNZ\Helpers\UserHelpers


### ip

Get the current ip address of the user.

```php
UserHelpers::ip(  ): null|string
```

### user_ip
Related global function.
```php
user_ip(  ): null|string
```

* This method is **static**.



---



--------
> This document was automatically generated from source code comments on 2018-01-12 using [phpDocumentor](http://www.phpdoc.org/) and [cvuorinen/phpdoc-markdown-public](https://github.com/cvuorinen/phpdoc-markdown-public)
