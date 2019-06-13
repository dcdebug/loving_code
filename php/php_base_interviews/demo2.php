<?php
$a = 55;

echo memory_get_usage().PHP_EOL;
$b=&$a;
echo memory_get_usage().PHP_EOL;

unset($b);
echo memory_get_usage().PHP_EOL;

unset($a);
echo memory_get_usage().PHP_EOL;

die;
var_dump($a);