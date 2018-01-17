[![Build Status](https://travis-ci.org/clausnz/php-helpers.svg?branch=master)](https://travis-ci.org/clausnz/php-helpers)

# About

The library `clausnz/php-helpers`  is a collection of **:nr_functions** useful php helper functions.  
Once installed with `composer`, the global functions are accessable from **everywhere** in your code:

#### Example
```php
<?php

dump( 'any content' );
```

If a function with the same name already exists in the list of your project's defined functions ( built-in and user-defined ), it will simply not be registered in your environment. Therefore, **no conflicts** will ever appear.  

Nevertheless, every function is still accessable it in a static way with the appropriate use-statement:

#### Example
```php
<?php

use CNZ\Helpers\Util as util;

util::dump( 'any content' );
```

#### Unit Tests

With every commit to the repository, every function is automatically tested against a number of unit-tests and PHP Versions.
