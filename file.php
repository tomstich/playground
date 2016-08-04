<?php

require 'fileutils.php';

/*
 * $ php file.php <filename> [<input>]
 */

 $usageMessage = "usage: php file.php <filename> [<input>]\n";

$fileName = getArguments(1, $argv);
$content = getArguments(2, $argv);

if ($fileName === false)  {

    echo $usageMessage;
    exit(1);
}

if ($content === false) {
    readContent($fileName);
} else {
    writeContent($content, $fileName);
}
