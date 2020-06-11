<?php

$test = "redis key";

$a = function () use($test){yield $test;};
var_dump($a);

echo PHP_EOL;

var_export($a);


echo PHP_EOL;

$b = function(){return yield;};

var_dump($b);

var_export($b);

echo PHP_EOL;

function test_yield(){
    yield;
}
$test = test_yield();

var_dump($test);

foreach($test as $k =>$v){
    var_dump($k).PHP_EOL;
    var_dump($v).PHP_EOL;
}

return false;
var_export($b);

var_export($b);
