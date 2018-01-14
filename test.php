<?php

define('PROJECT_DIR', __DIR__);
require PROJECT_DIR . '/vendor/autoload.php';

$name = 'John';
$age = '25';
$string = 'His name is :name. :name is :age years old.';

echo str_insert([':name' => $name, ':age' => $age], $string);