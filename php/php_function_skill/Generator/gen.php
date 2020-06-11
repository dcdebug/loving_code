<?php

function gen(){
    $ret = (yield  'yield1');
    var_dump($ret);
    //echo "ret 's value :".$ret.PHP_EOL;
    $ret = (yield 'yield2');
    var_dump($ret);
    //echo "ret  's value is :".$ret.PHP_EOL;

}

$gen = gen();
var_dump($gen->send("test"));


/*var_dump($gen->current());
var_dump($gen->next());*/
//var_dump($gen->current());
//var_dump($gen->send("ret_test_1"));
//var_dump($gen->current()).PHP_EOL;
//var_dump($gen->send("ret_test_2"));

//send函数，返回生成的值。

//var_dump($gen->current());





