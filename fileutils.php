<?php

function writeContent($content, $fileName)
{
    $handle = openFile($fileName);
    $res = fwrite($handle, $content);

    echo $res . " Bytes written\n";

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
        $bytes = readfile($fileName);
        echo "\n$bytes bytes read\n";
    } else {
        echo $fileName . ' not found!' . "\n";
        exit;
    }

}

function getArguments($argPos, $argv)
{
    if (isset($argv[$argPos])) {
        return $argv[$argPos];
    } else {
        return false;
    }

}
