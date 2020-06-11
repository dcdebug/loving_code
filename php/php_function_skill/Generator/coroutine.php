<?php


function xrange($start,$end,$step = 1){
    for($i = $start;$i<=$end;$i+=$step){
        yield $i;
    }
}

echo memory_get_usage(true).PHP_EOL;
$xrange = xrange(1,1000000);

var_dump($xrange->current());
var_dump($xrange->rewind());
var_dump($xrange->current());
var_dump($xrange->next());
var_dump($xrange->current());
if(!$xrange->valid()){
    echo "invalid point".PHP_EOL;
}else{
    echo "continue.....".PHP_EOL;
    echo "current element is :".$xrange->current();
}


var_dump($xrange instanceof  Iterator);

echo memory_get_usage().PHP_EOL;
/*foreach (xrange(1,1000000) as $num){
    echo $num.PHP_EOL;
}*/
