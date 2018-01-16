# About

The library `clausnz/php-helpers`  is a collection of `:nr_functions` useful php helper functions.  
Once installed, the global functions are accessable from **everywhere** in your code, without the need of any use-statement.

```php
<?php

dump( 'any content' );
```

If a function with the same name already exists in the list of your project's defined functions, both built-in (internal) and user-defined, it will simply not be registered in your environment.  
Nevertheless, it is still accessable it in a static way with the approbiate use-statement:

```php
<?php

use CNZ\Helpers\Util as util;

util::dump( 'any content' );
```
