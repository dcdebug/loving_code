<?php
$a = 5;

var_dump($a);
echo memory_get_usage().PHP_EOL;
$b =&$a;

echo memory_get_usage().PHP_EOL;

$a=6;

var_dump($b);

echo memory_get_usage().PHP_EOL;

