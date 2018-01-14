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

$functionCounter = 0;

foreach ($groupNames as $key => $groupName) {
    $leftContent = $leftGroup . $groupName . $rightGroup;
    $rightContent = $leftGroupEnd . $groupName . $rightGroup;
    $left = "(!function_exists('";
    $right = "'))";
    $functionNames = str_between($left, $right, str_between($leftContent, $rightContent, $helperContent)[0]);

    fwrite($md, "* [$groupName](#$functionNames[0])\n");
    foreach ($functionNames as $functionName) {
        fwrite($md, "    * [$functionName](#$functionName)\n");
        $functionCounter++;
    }
}

fclose($md);

// write number of functions to file
$fileNumberFunctions = PROJECT_DIR . "tmp/NR_FUNCTIONS";
file_put_contents($fileNumberFunctions, $functionCounter);


// write About.md
$fileAbout = PROJECT_DIR . "doc/About.md";
$fa = fopen($fileAbout, 'w+');

$fileAboutContent = "# About\n\n";
$description = "A Collection of :number useful php helper functions.\n";
$fileAboutContent .= str_insert([':number' => file_get_contents($fileNumberFunctions)], $description);

fwrite($fa, $fileAboutContent);

fclose($fa);
