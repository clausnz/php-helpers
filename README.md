# About

A Collection of useful php helper functions.


# Install

```php
todo
```

API Index
=========

* CNZ
    * CNZ\Helpers
        * [UserHelpers](CNZ-Helpers-UserHelpers.md)
        * [MobileHelpers](CNZ-Helpers-MobileHelpers.md)
        * [StringHelpers](CNZ-Helpers-StringHelpers.md)
        * [ArrayHelpers](CNZ-Helpers-ArrayHelpers.md)
        * [CommonHelpers](CNZ-Helpers-CommonHelpers.md)

CNZ\Helpers\ArrayHelpers
===============






* Class name: ArrayHelpers
* Namespace: CNZ\Helpers







Methods
-------


### isAssoc

    boolean CNZ\Helpers\ArrayHelpers::isAssoc(array $array)

Detects if the given value is an associative array.



* Visibility: **public**
* This method is **static**.


#### Arguments
* $array **array**



### toObject

    object CNZ\Helpers\ArrayHelpers::toObject(array $array)

Converts an array to an object.



* Visibility: **public**
* This method is **static**.


#### Arguments
* $array **array**



### fromObject

    array CNZ\Helpers\ArrayHelpers::fromObject($object)

Converts an object to an array.



* Visibility: **public**
* This method is **static**.


#### Arguments
* $object **mixed**



### first

    mixed CNZ\Helpers\ArrayHelpers::first(array $array)

Returns the first element of an array.



* Visibility: **public**
* This method is **static**.


#### Arguments
* $array **array**



### last

    mixed CNZ\Helpers\ArrayHelpers::last(array $array)

Returns the last element of an array.



* Visibility: **public**
* This method is **static**.


#### Arguments
* $array **array**


CNZ\Helpers\CommonHelpers
===============






* Class name: CommonHelpers
* Namespace: CNZ\Helpers







Methods
-------


### dd

    mixed CNZ\Helpers\CommonHelpers::dd(mixed $var)

Dumps the content of the given variable and exits the script.



* Visibility: **public**
* This method is **static**.


#### Arguments
* $var **mixed**



### dump

    mixed CNZ\Helpers\CommonHelpers::dump(mixed $var)

Dumps the content of the given variable.



* Visibility: **public**
* This method is **static**.


#### Arguments
* $var **mixed**


CNZ\Helpers\MobileHelpers
===============






* Class name: MobileHelpers
* Namespace: CNZ\Helpers





Properties
----------


### $mobileDetectInstance

    private  $mobileDetectInstance

Holds the Mobile_Detect singleton object



* Visibility: **private**
* This property is **static**.


Methods
-------


### isSmartphone

    boolean CNZ\Helpers\MobileHelpers::isSmartphone(null $userAgent)

Determes if the current user agent is running on a smartphone.



* Visibility: **public**
* This method is **static**.


#### Arguments
* $userAgent **null**



### isMobile

    boolean CNZ\Helpers\MobileHelpers::isMobile(string $userAgent)

Detects if the current user agent is running on a mobile device.



* Visibility: **public**
* This method is **static**.


#### Arguments
* $userAgent **string**



### mobileDetect

    \Mobile_Detect CNZ\Helpers\MobileHelpers::mobileDetect()

Get a singleton Mobile_Detect object to call every method it provides.

Public access for use of outside this class.
Mobile_Detect doku: https://github.com/serbanghita/Mobile-Detect

* Visibility: **public**
* This method is **static**.




### isTablet

    boolean CNZ\Helpers\MobileHelpers::isTablet(string $userAgent)

Determes if the current user agent is a tablet device.



* Visibility: **public**
* This method is **static**.


#### Arguments
* $userAgent **string**



### isDesktop

    boolean CNZ\Helpers\MobileHelpers::isDesktop(string $userAgent)

Determes if the current user agent is a desktop computer.



* Visibility: **public**
* This method is **static**.


#### Arguments
* $userAgent **string**



### isAndroid

    boolean CNZ\Helpers\MobileHelpers::isAndroid(string $userAgent)

Determes if the current user agent is running on an Android device.



* Visibility: **public**
* This method is **static**.


#### Arguments
* $userAgent **string**



### isIphone

    boolean CNZ\Helpers\MobileHelpers::isIphone(string $userAgent)

Determes if the current user agent is running on an iPhone device.



* Visibility: **public**
* This method is **static**.


#### Arguments
* $userAgent **string**



### isSamsung

    boolean|integer|null CNZ\Helpers\MobileHelpers::isSamsung(null $userAgent)

Determes if the current user agent is running on a Samsung device.



* Visibility: **public**
* This method is **static**.


#### Arguments
* $userAgent **null**



### isIOS

    boolean|integer|null CNZ\Helpers\MobileHelpers::isIOS(null $userAgent)

Determes if the current user agent is running on an iOS operating system.



* Visibility: **public**
* This method is **static**.


#### Arguments
* $userAgent **null**



### isTouchDevice

    boolean CNZ\Helpers\MobileHelpers::isTouchDevice(null $userAgent)

Determes if the current user agent is running on a mobile touch device.



* Visibility: **public**
* This method is **static**.


#### Arguments
* $userAgent **null**


CNZ\Helpers\StringHelpers
===============






* Class name: StringHelpers
* Namespace: CNZ\Helpers







Methods
-------


### after

    string CNZ\Helpers\StringHelpers::after(string $search, string $string)

Return the remainder of a string after a given value.



* Visibility: **public**
* This method is **static**.


#### Arguments
* $search **string**
* $string **string**



### before

    string CNZ\Helpers\StringHelpers::before(string $search, string $string)

Get the portion of a string before a given value.



* Visibility: **public**
* This method is **static**.


#### Arguments
* $search **string**
* $string **string**



### limitWords

    string CNZ\Helpers\StringHelpers::limitWords(string $string, integer $limit, string $end)

Limit the number of words in a string. Put value of $end to the string end.



* Visibility: **public**
* This method is **static**.


#### Arguments
* $string **string**
* $limit **integer**
* $end **string**



### limit

    string CNZ\Helpers\StringHelpers::limit(string $string, integer $limit, string $end)

Limit the number of characters in a string. Put value of $end to the string end.



* Visibility: **public**
* This method is **static**.


#### Arguments
* $string **string**
* $limit **integer**
* $end **string**



### contains

    boolean CNZ\Helpers\StringHelpers::contains(string|array $needle, string $haystack)

Tests if a string contains a given element



* Visibility: **public**
* This method is **static**.


#### Arguments
* $needle **string|array**
* $haystack **string**



### containsIgnoreCase

    boolean CNZ\Helpers\StringHelpers::containsIgnoreCase(string|array $needle, string $haystack)

Tests if a string contains a given element. Ignore case sensitivity.



* Visibility: **public**
* This method is **static**.


#### Arguments
* $needle **string|array**
* $haystack **string**



### startsWith

    boolean CNZ\Helpers\StringHelpers::startsWith(string|array $needle, string $haystack)

Determine if a given string starts with a given substring.



* Visibility: **public**
* This method is **static**.


#### Arguments
* $needle **string|array**
* $haystack **string**



### startsWithIgnoreCase

    boolean CNZ\Helpers\StringHelpers::startsWithIgnoreCase(string|array $needle, string $haystack)

Determine if a given string starts with a given substring. Ignore case sensitivity.



* Visibility: **public**
* This method is **static**.


#### Arguments
* $needle **string|array**
* $haystack **string**



### endsWith

    boolean CNZ\Helpers\StringHelpers::endsWith(string|array $needle, string $haystack)

Determine if a given string ends with a given substring.



* Visibility: **public**
* This method is **static**.


#### Arguments
* $needle **string|array**
* $haystack **string**



### endsWithIgnoreCase

    boolean CNZ\Helpers\StringHelpers::endsWithIgnoreCase(string|array $needle, string $haystack)

Determine if a given string ends with a given substring.



* Visibility: **public**
* This method is **static**.


#### Arguments
* $needle **string|array**
* $haystack **string**


CNZ\Helpers\UserHelpers
===============






* Class name: UserHelpers
* Namespace: CNZ\Helpers







Methods
-------


### ip

    mixed CNZ\Helpers\UserHelpers::ip()





* Visibility: **public**
* This method is **static**.



