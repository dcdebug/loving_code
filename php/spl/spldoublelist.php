<?php


$obj = new SplDoublyLinkedList();

var_dump($obj);


$arr = [ 'test','test2','test3'];

$obj->push($arr);
$obj->push(['t','s','s']);
$obj->push(['a','b','c']);
var_dump($obj);
