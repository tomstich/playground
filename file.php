<?php

require 'fileutils.php';

/*
 * $ php file.php <filename> [<input>]
 */

$errorMessage = "usage: php file.php <filename> [<input>]\n";

if (isset($argv[1])) {
    $fileName = $argv[1];
} else {
    echo $errorMessage;
    exit(1);
}

if (isset($argv[2])) {
    $content = $argv[2];
} else {
    echo $errorMessage;
    exit(2);
}


writeContent($content, $fileName);
