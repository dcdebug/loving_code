<?php


$array_a = new ArrayIterator(array("apple","banana","curl"/*,array("google","google.com")*/));
$array_b = new ArrayIterator(array("orange",'yellow','NingMeng'));

$it = new AppendIterator();
$it->append($array_a);
$it->append($array_b);

foreach($it as $key=>$value){
    echo $key." : ".$value." ; ".PHP_EOL;

}