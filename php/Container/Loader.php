<?php

namespace  Container;


class Loader{

    static function autoloader($class){
        //echo $class.PHP_EOL;
/*        echo BASEDIR.DIRECTORY_SEPARATOR.str_replace("\\","/",$class).".php".PHP_EOL;*/
        if(file_exists(BASEDIR.DIRECTORY_SEPARATOR.str_replace("\\","/",$class).".php")){
            echo BASEDIR.DIRECTORY_SEPARATOR.str_replace("\\","/",$class).".php".PHP_EOL;
            require_once BASEDIR.DIRECTORY_SEPARATOR.str_replace("\\","/",$class).".php";
        }else{
            echo "file not found ";
        }
        //包含命名空间的字符串
        //自动载入类
        //require_once  BASEDIR.DIRECTORY_SEPARATOR.str_replace("\\","/",$class).".php";

    }


}