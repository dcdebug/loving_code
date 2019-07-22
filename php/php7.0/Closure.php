<?php

//php7.0 closure::call
class Test{
    private  $num = 1;

}
$f = function(){
    return $this->num+1;
};
echo $f->call(new Test());
echo PHP_EOL;


