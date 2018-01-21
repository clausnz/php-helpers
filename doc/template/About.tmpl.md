[![Build Status](https://travis-ci.org/clausnz/php-helpers.svg?branch=master)](https://travis-ci.org/clausnz/php-helpers)

# About

The library `clausnz/php-helpers`  is a collection of **:nr_functions** useful php helper functions `(PHP 5.6, 7.*)`.  
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
