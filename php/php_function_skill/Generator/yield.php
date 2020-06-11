<?php

// https://www.php.net/manual/zh/language.generators.syntax.php
// 生成器语法


function gen_one_to_x($x){
    for($i=1;$i<=$x;$i++){
        yield $i;
    }
}

$gen = gen_one_to_x(4);

var_dump($gen);

echo PHP_EOL;

foreach($gen as $k=>$v){
    echo "k is $k".PHP_EOL;
    echo "v is $v".PHP_EOL;
}


$test = "redis key";

$a = function () use($test){yield $test;};
var_dump($a);

