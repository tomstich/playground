<?php

$a = true;
$b = false;
$c = true;

// && has precedence before ||
$expression = !$a && ($b || $c);

if ($expression) {
    echo "Expression evaluated to true!\n";
} else {
    echo "Expression evaluated to false!\n";
}
