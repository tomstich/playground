<?php

// Wenn Datei nicht existiert, dann erstellen wir sie
// Datei öffnen
// Zu speichernde Daten aus Argument einlesen
define('FILENAME', 'file.txt');

if (!file_exists(FILENAME)) {
    echo FILENAME . ' does not exist!' . "\n" . 'Creating the File' . "\n";
}
$handle = fopen(FILENAME , "w+");

$somecontent = 'Hund,Hase,Maus';

if (fwrite($handle, $somecontent) === FALSE) {
    echo "Cannot write to file ($filename)";
    exit;
}
