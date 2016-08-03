<?php

define("FREE" , "20");

$integer = 42;
$string = 'Hallo';

function type($var , $return)
{
    if ($return == true) {
        return gettype($var);
    } else {
        echo gettype($var) . "\n";
    }
}

echo type($integer , true);
type($string , false);
echo type(25.5 , true);
echo type(FREE , true);
