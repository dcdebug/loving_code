<?php
 //实现自动加载

define("BASEDIR",__DIR__);


include BASEDIR.DIRECTORY_SEPARATOR."Common".DIRECTORY_SEPARATOR."Loader.php";

spl_autoload_register("\Common\Loader::autoloader");





$image = new Common/Proxyimage("test.png");

var_dump($image);
