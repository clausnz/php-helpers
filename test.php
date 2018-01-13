<?php

require __DIR__ . '/vendor/autoload.php';

use CNZ\Helpers\StringHelpers as str;

$string = "Dies ist ein Tag<@@#>Here is content</@@#>Dies ist ein Tag<@@#>Here is content</@@#>";

$left = "1<@@#>";
$right = "1</@@#>";

dump(str::between($left, $right, $string));