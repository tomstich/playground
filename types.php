<?php

$integer = 42;
$string = 'Hallo';

function type($var) {
  echo gettype($var) . "\n";
}

type($integer);
type($string);
type(25.5);
