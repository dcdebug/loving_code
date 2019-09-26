<?php
namespace  Common;

class Loader{

    //实现动态加载

    static function autoloader($class){
            //包含命名空间的字符串
            //自动载入类

            require_once  BASEDIR.DIRECTORY_SEPARATOR.str_replace("\\","/",$class).".php";

    }

}