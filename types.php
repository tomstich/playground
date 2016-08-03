<?php

$integer = 42;
$string = 'Hase';

function type($var) {
    echo gettype($var) . "\n";
}

type($integer);
type($string);
type(42.7);
