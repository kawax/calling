<?php
error_reporting(E_ALL & ~E_NOTICE);

$name = __DIR__ . '/number.csv';
$file = new SplFileObject($name);
$file->setFlags(SplFileObject::READ_CSV);

$numbers = [];

foreach ($file as $line) {
    if (is_numeric($line[2]) and !is_null($line[0])) {
        $numbers['0' . $line[2]] .= $line[1] . ' ';
    }
}

file_put_contents(__DIR__ . '/number.json', json_encode($numbers, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

$numbers = json_decode(file_get_contents(__DIR__ . '/number.json'), true);
var_dump(count($numbers));
