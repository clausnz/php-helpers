[![Build Status](https://travis-ci.org/clausnz/php-helpers.svg?branch=master)](https://travis-ci.org/clausnz/php-helpers)

# About

The library `clausnz/php-helpers`  is a collection of **:nr_functions** useful php helper functions `(PHP 5.6, 7.0, 7.1, 7.2)`.  
After installation with `composer`, the global functions are accessable from **everywhere** in your code:

#### Example
```php
<?php

dump( 'any content' );
```

If a function with the same name already exists in the list of your project's defined functions ( built-in and user-defined ), it will simply not be registered in your environment. Therefore, **no conflicts** with existing functions will appear.  

Nevertheless, every function is still accessable it in a static way with the appropriate use-statement:

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

## Unit Tests

Every function is automatically tested against a number of unit-tests and PHP Versions. 
[![Build Status](https://travis-ci.org/clausnz/php-helpers.svg?branch=master)](https://travis-ci.org/clausnz/php-helpers)
