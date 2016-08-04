<?php

require 'fileutils.php';

/*
 * $ php file.php <filename> [<input>]
 */

 $usageMessage = "usage: php file.php <filename> [<input>]\n";

if (isset($argv[1])) {
    $fileName = $argv[1];
} else {
    echo $usageMessage;
    exit(1);
}

if (isset($argv[2])) {
    $content = $argv[2];
    writeContent($content, $fileName);
} else {
    readContent($argv[1]);
}
