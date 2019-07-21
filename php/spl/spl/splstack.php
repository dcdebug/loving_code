<?php

$stack = new SplStack();

$stack->push("first");
$stack->push("second");
$stack->push("third");
$stack->push("fourth");


print_r($stack);

$stack->rewind();

$stack->next();

echo "current point:".$stack->current().PHP_EOL;

echo "遍历堆栈".PHP_EOL;

$stack->rewind();

while($stack->valid()){
    echo "key is :".$stack->key()." ;value is :".$stack->current().PHP_EOL;
    $stack->next();
}
echo "pop操作".PHP_EOL;


$stack->pop();

print_r($stack);




