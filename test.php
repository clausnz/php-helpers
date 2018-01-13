<?php

require __DIR__ . '/vendor/autoload.php';

use CNZ\Helpers\Str as str;





preg_match_all('/' . preg_quote($left, '/') . '(.*?)' . preg_quote($right, '/') . '/', $string, $matches);