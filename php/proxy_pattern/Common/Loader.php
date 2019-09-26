<?php
namespace  Common;

class Loader{

    static  function autoloader($class){

        include BASEDIR.DIRECTORY_SEPARATOR.str_replace("\\",'/',$class).".php";
    }
}