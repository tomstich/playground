<?php

// Wenn Datei nicht existiert, dann erstellen wir die
// Eine Datei öffnen
// Zu speichernde Daten aus Argument einlesen

define('FILENAME', 'file.txt');

if (!file_exists(FILENAME)) {
    echo 'File ' . FILENAME . ' does not exist!' . "\n" . 'Creating the file.' . "\n";
}

$handle = fopen(FILENAME, 'w+');
$somecontent = 'Die ist ein bisschen Text' . "\n";

if (fwrite($handle, $somecontent) === FALSE) {
    echo "Cannot write to file ($filename)";
    exit;
}
