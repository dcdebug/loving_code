<?php
class Person{

    public $name;

}


$p1 = new Person();
xdebug_debug_zval('p1');
$p2 = $p1;
xdebug_debug_zval('p1');

$p1->name='darrykinger';
xdebug_debug_zval('p1');
