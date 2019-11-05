<?php
namespace  Common;
class Realimage implements  Image {

    protected  $fileName;

    public  function __construct()
    {

    }
    public  function display(){
            echo "I'm from ".__CLASS__." class 's function :display".PHP_EOL;
    }
    public  function loadFromDisk(){

    }

}