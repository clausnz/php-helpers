<?php

require __DIR__ . '/vendor/autoload.php';


$match = "/function_exists\(\'(.*?)\'\)/";
$helperFile = "./src/helpers.php";
$mdFile = "./doc/Table_of_Content_Functions.md";


$content = file_get_contents($helperFile);
preg_match_all($match, $content, $matches);

$md = fopen($mdFile, 'w+');

$result = [];

fwrite($md, "# Global Functions\n\n");
fwrite($md, "## Table of Contents\n\n");

foreach ($matches[1] as $funcName) {
    fwrite($md, "* [$funcName](#$funcName)\n");
}

fclose($md);