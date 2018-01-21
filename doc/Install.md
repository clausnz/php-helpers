# Install

Install the latest `clausnz/php-helper` library with composer:

```bash
composer require clausnz/php-helpers
```

Also make sure to require your composer autoload file:

```php
require __DIR__ . '/vendor/autoload.php';
```

After installation, the new global PHP functions are available everywhere in your code. To access the ( almost identical ) static functions in the helper classes, add the proper use statement to your file:

#### Example
 ```php
 <?php
 
use CNZ\Helpers\Dev as dev;

if( dev::isIphone() ) {
    // Do something here
}
 ```
 