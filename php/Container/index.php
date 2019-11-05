<?php



define("BASEDIR",__DIR__);



if(file_exists(BASEDIR."/Loader.php")){
    require_once BASEDIR.DIRECTORY_SEPARATOR."Loader.php";
}else{

    echo 'not found the file Loader.php'.PHP_EOL;
}



//自动加载函数

spl_autoload_register("\Container\Loader::autoloader");

$container = new Container();
var_dump($container);