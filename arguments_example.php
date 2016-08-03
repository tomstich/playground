<?php

# Das ist ein Kommentar
// Das ist auch ein Kommentar
/*
Das ist auch ein Kommentar
*/

var_dump($argv);

$vorname = '';
$nachname = '';
if (isset($argv[1])) {
  $vorname = $argv[1];
}

if (isset($argv[2])) {
  $nachname = $argv[2];
}

echo 'Vorname: ' . $vorname . "\nNachname: " .  $nachname . "\n";
echo "Vorname: $vorname\nNachname: $nachname\n";

echo strlen('\n') . "\n";
echo strlen("\n") . "\n";
