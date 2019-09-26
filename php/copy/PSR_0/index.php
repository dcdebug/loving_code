<?php


define("BASEDIR",__DIR__);


include BASEDIR."/Common/Loader.php";

//自动加载函数

spl_autoload_register("\Common\Loader::autoloader");
