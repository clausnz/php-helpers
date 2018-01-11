## About

Useful php helper functions for everyday use.


## Install

```php
todo
```

## Table of Contents
[Mobile-Device helper functions](#mobile-device-helper-functions)

## Mobile device helper functions

Credits:  
Makes use of the well known Mobile_Detect library of serbanghita:
- http://mobiledetect.net/
- https://github.com/serbanghita/Mobile-Detect

Usage:  
To get static access to the library functions, make sure to import the namespace:
```
use CNZ\Helpers\MobileHelpers as mobile;
```


#### Mobile device detection
Detects if the current visitor uses a mobile device.
```php
// global function
is_mobile() : bool

// static access
mobile::isMobile() : bool
```



#### Touch device detection
Detects if the current visitor uses a touch device.
```php
// global function
is_touch_device() : bool

// static access
mobile::isTouchDevice() : bool
```



#### Smartphone detection
Detects if the current visitor uses a smartphone.
```php
// global function
is_smartphone() : bool

// static access
mobile::isSmartphone() : bool
```



#### Tablet detection
Detects if the current visitor uses a tablet.
```php
// global function
is_tablet() : bool

// static access
mobile::isTablet() : bool
```



#### Desktop computer detection
Detects if the current visitor uses a desktop computer.
```php
// global function
is_desktop() : bool

// static access
mobile::isDesktop() : bool
```



#### iPhone detection
Detects if the current visitor uses an iPhone.
```php
// global function
is_iphone() : bool

// static access
mobile::isIphone() : bool
```



#### Samsung device detection
Detects if the current visitor uses a mobile Samsung device.
```php
// global function
is_samsung() : bool

// static access
mobile::isSamsung() : bool
```



#### iOS device detection
Detects if the current visitor uses an iOS based device.
```php
// global function
is_ios() : bool

// static access
mobile::isIOS() : bool
```



#### Android device detection
Detects if the current visitor uses an Android based device.
```php
// global function
is_ios() : bool

// static access
mobile::isIOS() : bool
```



#### Get Mobile_Detect object
Get access to all functions of the Mobile_Detect library  
More info and doku: https://github.com/serbanghita/Mobile-Detect
```php
// static access
mobile::mobileDetect() : Mobile_Detect

// example
$detect = mobile::mobileDetect();
$androidVersion = $detect->version('Android');
```