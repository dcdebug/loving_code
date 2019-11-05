<?php
 //实现自动加载

define("BASEDIR",__DIR__);


include BASEDIR.DIRECTORY_SEPARATOR."Common".DIRECTORY_SEPARATOR."Loader.php";

spl_autoload_register("\Common\Loader::autoloader");

//代理模式
$proxy = new \Common\Proxyimage("test.png");

$proxy->action();
//代理模式


//AOP编程思想



