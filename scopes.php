<?php

$a = "Hase\n";

echo "Function definition start\n";
function test($a)
{
    $b = "Igel\n";
    echo $b;
    echo $a;
    // Returns the value NOT the variable!
    return $b;
}
echo "Function definition end\n";

echo "Function test() start\n";

// "Igel\n";
$b = test($a);
echo "Function test() end\n";

echo $b;
echo $a;
