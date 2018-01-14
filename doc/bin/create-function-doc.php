<?php

define('PROJECT_DIR', __DIR__ . '/../../');
require PROJECT_DIR . 'vendor/autoload.php';

/*
 * Generate "Table of Content" for global functions.
 */

// define some vars
$helperFile = PROJECT_DIR . "src/helpers.php";
$tocFile = PROJECT_DIR . "doc/Table_of_Content_Functions.md";
$helperContent = file_get_contents($helperFile);

// get group name from functions file
$leftGroup = "@group(";
$leftGroupEnd = "@endgroup(";
$rightGroup = ")";
$groupNames = str_between($leftGroup, $rightGroup, $helperContent);

// write header of ToC to file
$tocContent = "# Available PHP Functions\n\n";
$tocContent .= "## Table of Contents\n\n";

// create ToC for functions and write to file
$functionCounter = 0;
foreach ($groupNames as $key => $groupName) {
    $leftContent = $leftGroup . $groupName . $rightGroup;
    $rightContent = $leftGroupEnd . $groupName . $rightGroup;
    $left = "(!function_exists('";
    $right = "'))";
    $functionNames = str_between($left, $right, str_between($leftContent, $rightContent, $helperContent)[0]);

    $tocContent .= "* [$groupName](#$functionNames[0])\n";
    foreach ($functionNames as $functionName) {
        $tocContent .= "    * [$functionName](#$functionName)\n";
        $functionCounter++;
    }
}
file_put_contents($tocFile, $tocContent);

/*
 * Generate "About" section.
 */

// write number of functions to file
$fileNumberFunctions = PROJECT_DIR . "tmp/NR_FUNCTIONS";
file_put_contents($fileNumberFunctions, $functionCounter);

// write About.md
$fileAbout = PROJECT_DIR . "doc/About.md";

$fileAboutContent = "# About\n\n";
$description = "A Collection of :number useful php helper functions.\n";
$fileAboutContent .= str_insert([':number' => file_get_contents($fileNumberFunctions)], $description);

file_put_contents($fileNumberFunctions, $fileAboutContent);
