<?php
$result = array(
    0=>array('a'=>1,'b'=>'Hello'),
    1=>array('a'=>1,'b'=>'Hello'),
    2=>array('a'=>1,'b'=>'other'),
    3=>array('a'=>1,'b'=>'other'),
    4=>array('a'=>1,'b'=>'other'),
    'b'=>array('a'=>1,'b'=>'others'),
);


print_r($result);

$unique_result = array_unique($result,SORT_REGULAR);


print_r($unique_result);




