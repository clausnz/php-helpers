
[![Build Status](https://travis-ci.org/clausnz/php-helpers.svg?branch=master)](https://travis-ci.org/clausnz/php-helpers)

# Install

To install the latest clausnz/php-helper library, add the following lines to your composer.json: 

#### Example
```json
{
  "repositories": [
    {
      "url": "https://github.com/clausnz/php-helpers",
      "type": "git"
    }
  ],
  "require": {
    "clausnz/php-helpers": "dev-master"
  }
}
```

Make sure to require your composer autoload file:

#### Example
```php
require __DIR__ . '/vendor/autoload.php';
```

Now the new global PHP functions are immediately available in your code. To also access the static functions in the helper classes, add an approbiate use statement to your file:

#### Example
 ```php
 <?php
 
use CNZ\Helpers\Dev as dev;

if( dev::isIphone() ) {
    // Do something here
}
 ```
 
 