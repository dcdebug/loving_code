<?php
//自动载入test1 ,test2这两个文件

spl_autoload_register("autoload1");
test1::test();
test2::test();

//__autoload这个函数已经被废弃了。

/*function __autoload($class){
    echo __DIR__.DIRECTORY_SEPARATOR.$class.".php";
}*/

//自动加载可以采用php sql_auto_load
function autoload1($class){
    require_once  __DIR__.DIRECTORY_SEPARATOR.$class.".php";
}

