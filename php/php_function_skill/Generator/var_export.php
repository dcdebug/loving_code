<?php

$a = array(
    'a'=>'test',
    'b'=>'debug',
    'c'=>"c_test",
    'd'=>'darryinger',
    'e'=>'var_dump',
    'f'=>array(1,2,3,4,5),
    'g'=>array(
        'test'=>'gaoer',
        'test_debug'=>'test'
    )
);
var_dump($a);
echo "==========".PHP_EOL;

var_export($a);

echo "===========".PHP_EOL;

$v= var_export($a,true);
echo $v;
echo PHP_EOL;

class A{

    public $var1;

    public $var2;

    public static function __set_state($an_array)
    {
        // TODO: Implement __set_state() method.
        $obj = new A;
        $obj->var1 = $an_array['var1'];
        $obj->var2 = $an_array['var2'];
        return $obj;
    }
}


$a = new A;

$a->var1 = 5;

$a->var2 = 'fooooo';

eval('$b = '.var_export($a,true).";");

var_export($b);
echo PHP_EOL;
echo "====================";
echo PHP_EOL;
var_dump($b);




