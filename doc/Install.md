# Install

To install the latest `clausnz/php-helper` library, simply add the following lines to your `composer.json` and run a `composer update`: 

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

Also make sure to require your composer autoload file:

#### Example
```php
require __DIR__ . '/vendor/autoload.php';
```

After installation, the new global PHP functions are immediately available everywhere in your code. To also access the ( almost identical ) static functions in the helper classes, add an approbiate use statement to your file:

#### Example
 ```php
 <?php
 
use CNZ\Helpers\Dev as dev;

if( dev::isIphone() ) {
    // Do something here
}
 ```
 