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


