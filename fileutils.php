<?php

function writeContent($content, $fileName)
{
    $handle = openFile($fileName);
    $res = fwrite($handle, $content);

    fclose($handle);

    if ($res === false) {
        echo "Cannot write to $fileName\n";
        exit;
    }
}

function checkForFile($fileName)
{
    $fileExists = file_exists($fileName);

    if (!$fileExists) {
        echo $fileName . ' does not exist!' . "\n" . 'Creating the File' . "\n";
    }
}

function openFile($fileName)
{
    checkForFile($fileName);

    $handle = fopen($fileName , "w+");

    if (!$handle) {
        echo 'Could not open file!' . "\n";
        exit;
    }
    return $handle;
}

function readContent($fileName)
{
    if (file_exists($fileName)) {
        readfile($fileName);
        echo "\n";
    } else {
        echo $fileName . ' not found!' . "\n";
        exit;
    }

}
