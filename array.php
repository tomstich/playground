<?php
$arrayKeys = [
    "Hase" => "Bunny" . "Langohr",
    "Igel" => "Piksi",
    "Datum" => "05.08.2016",
    "Fastfood" => "Pizza",
    "Value" => 123,
];

$array1 = [
    "hase",
    "igel",
    "fuchs",
];

foreach ($arrayKeys as $key => $value) {
    echo "$key => $value\n";
}


exit;

$arraySlice = array_slice($array1, 1, 1);
var_dump($arraySlice);

unset($array1[1]);
var_dump($array1);


$arrayIndices = [
    "0" => "test0",
    "1" => "test1",
    "2" => "test2",
    "3" => "test3",
];

$arrayKeys = [
    "Hase" => "Bunny" . "Langohr",
    "Igel" => "Piksi",
    "Datum" => "05.08.2016",
    "Fastfood" => "Pizza",
    "Value" => 123,
];

$arrayIndices = [
    "test0",
    "test1",
    "test2",
    "test3",
    $arrayKeys
];

echo 'Ausgabe einer Index Array.' . "\n";
var_dump($arrayIndices);

echo 'Ausgabe des ersten Eintrags aus der Liste.' . "\n";
echo $arrayIndices[0] . "\n";

$arrayKeys2 = [
    "Hase" => "Bunny" . "Langohr",
    "Igel" => "Piksi",
    "Datum" => "05.08.2016",
    "Fastfood" => "Pizza",
    "Value" => 123,
    "List" => $arrayIndices,
];

echo 'Ausgabe eines Keys Array.' . "\n";
$arrayKeys2["List"][4]["Igel"] = "Hannez";
var_dump($arrayKeys2["List"][4]["Igel"]);

// var_dump($arrayKeys) . "\n";

echo 'Ausgabe von Hase.' . "\n";
echo $arrayKeys['Hase'] . "\n";

//für array_fill muss ein integer als Index eingegeben werden!
echo 'Ausgabe einer Array die mit fill_array erstellt wurde.' . "\n";
$fillArray = array_fill(2, 10, 'Banane');
var_dump($fillArray);

echo 'Ausgabe von der vorherigen Array mit zwei weiteren Eintraegen am Ende.' . "\n";
array_push($fillArray, "Apfel", "Himbeere", "\n");
echo print_r($fillArray, true) . "\n";

$arrayTypes = array(
    1    => "a",
    "1"  => "b",
    1.5  => "c",
    true => "d",
);

echo 'Ausgabe eines Beispiels wie php mit verschiedenen Typen umgeht, wenn sie den gleichen Wert haben.' . "\n";
echo 'Bei der Ausgabe macht php aus den Indices: 1 = 1, aus "1" = 1, aus 1.5 = 1, true = 1' . "\n";
var_dump($arrayTypes) . "\n";

echo 'Ausgabe eines merged Arrays von $arrayIndices und $fillArray' . "\n";
$mergeArray = array_merge($arrayIndices, $fillArray);
var_dump($mergeArray) . "\n";
