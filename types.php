<?php

define('MAX_VALUE', 100);

$integer = 42;
$string = 'Hase';

function type($var, $return)
{
  if ($return == true) {
      return gettype($var);
  } else {
      echo gettype($var) . "\n";
  }
}

type($integer, false);
type($string, false);
type(42.7, false);
type(MAX_VALUE, false);
