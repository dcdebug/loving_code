<?php


function logger($fileName){
    $fileHandle = fopen($fileName,"a");

    while(true){
        fwrite($fileHandle,yield.PHP_EOL);
    }
}

$logger  = logger(__DIR__."/log/a.txt");
$logger->send("Foo");
$logger->send("Bar");


