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


