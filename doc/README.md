# API Documentation

## Table of Contents

* [ArrayHelpers](#arrayhelpers)
    * [isAssoc](#isassoc)
    * [toObject](#toobject)
    * [fromObject](#fromobject)
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



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |




---

### toObject

Converts an array to an object.

```php
ArrayHelpers::toObject( array $array ): object
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |




---

### fromObject

Converts an object to an array.

```php
ArrayHelpers::fromObject(  $object ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$object` | **** |  |




---

### first

Returns the first element of an array.

```php
ArrayHelpers::first( array $array ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |


**Return Value:**

$value



---

### last

Returns the last element of an array.

```php
ArrayHelpers::last( array $array ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |


**Return Value:**

$value



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
MobileHelpers::isSmartphone( null $userAgent = null ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$userAgent` | **null** |  |




---

### isMobile

Detects if the current user agent is running on a mobile device.

```php
MobileHelpers::isMobile( string $userAgent = null ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$userAgent` | **string** |  |




---

### mobileDetect

Get a singleton Mobile_Detect object to call every method it provides.

```php
MobileHelpers::mobileDetect(  ): \Mobile_Detect
```

Public access for use of outside this class.
Mobile_Detect doku: https://github.com/serbanghita/Mobile-Detect

* This method is **static**.



---

### isTablet

Determes if the current user agent is a tablet device.

```php
MobileHelpers::isTablet( string $userAgent = null ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$userAgent` | **string** |  |




---

### isDesktop

Determes if the current user agent is a desktop computer.

```php
MobileHelpers::isDesktop( string $userAgent = null ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$userAgent` | **string** |  |




---

### isAndroid

Determes if the current user agent is running on an Android device.

```php
MobileHelpers::isAndroid( string $userAgent = null ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$userAgent` | **string** |  |




---

### isIphone

Determes if the current user agent is running on an iPhone device.

```php
MobileHelpers::isIphone( string $userAgent = null ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$userAgent` | **string** |  |




---

### isSamsung

Determes if the current user agent is running on a Samsung device.

```php
MobileHelpers::isSamsung( null $userAgent = null ): boolean|integer|null
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$userAgent` | **null** |  |




---

### isIOS

Determes if the current user agent is running on an iOS operating system.

```php
MobileHelpers::isIOS( null $userAgent = null ): boolean|integer|null
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$userAgent` | **null** |  |




---

### isTouchDevice

Determes if the current user agent is running on a mobile touch device.

```php
MobileHelpers::isTouchDevice( null $userAgent = null ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$userAgent` | **null** |  |




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



* This method is **static**.



---



--------
> This document was automatically generated from source code comments on 2018-01-12 using [phpDocumentor](http://www.phpdoc.org/) and [cvuorinen/phpdoc-markdown-public](https://github.com/cvuorinen/phpdoc-markdown-public)
