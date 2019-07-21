<?php

$splqueue = new SplQueue();

$splqueue->enqueue("first");
$splqueue->enqueue("second");
$splqueue->enqueue("third");
$splqueue->enqueue("fourthly");
$splqueue->enqueue("fiftly");

print_r($splqueue);


print_r($splqueue->dllist);
