<?php


class Person{

    public  $a;
    public  function __construct()
    {
        $this->a= 5;
    }

    public  function __clone()
    {
        $this->a=99999;
        //return new self();
        // TODO: Implement __clone() method.
    }
}

$person  = new Person();

var_dump($person);

//php5 当对象被复制后，PHP 5 会对对象的所有属性执行一个浅复制（shallow copy）。所有的引用属性 仍然会是一个指向原来的变量的引用。

echo PHP_EOL;

$ps = clone $person;
var_dump($ps);
/*$ps->a=99;
var_dump($ps);*/
var_dump($person);

