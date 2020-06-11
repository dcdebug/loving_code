<?php

function printer(){
    while(true){
        $string = yield;
        echo $string;
    }
}

$printer = printer();

var_dump($printer->send("Hello World"));
