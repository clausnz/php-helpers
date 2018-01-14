<?php

define('PROJECT_DIR', __DIR__ . '/../../');
require PROJECT_DIR . 'vendor/autoload.php';

$helperFile = PROJECT_DIR . "src/helpers.php";
$mdFile = PROJECT_DIR . "doc/Table_of_Content_Functions.md";
$helperContent = file_get_contents($helperFile);

$leftGroup = "@group(";
$leftGroupEnd = "@endgroup(";
$rightGroup = ")";
$groupNames = str_between($leftGroup, $rightGroup, $helperContent);

$md = fopen($mdFile, 'w+');

fwrite($md, "# Available PHP Functions\n\n");
fwrite($md, "## Table of Contents\n\n");

foreach ($groupNames as $key => $groupName) {
    $leftContent = $leftGroup . $groupName . $rightGroup;
    $rightContent = $leftGroupEnd . $groupName . $rightGroup;
    $left = "(!function_exists('";
    $right = "'))";
    $functionNames = str_between($left, $right, str_between($leftContent, $rightContent, $helperContent)[0]);

    fwrite($md, "* [$groupName]($functionNames[0])\n");
    foreach ($functionNames as $functionName) {
        fwrite($md, "    * [$functionName](#$functionName)\n");
    }
}

fclose($md);

