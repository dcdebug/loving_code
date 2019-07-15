<?php

namespace Common;

class Loader
{

    //实现自动加载

    //需要网站的根目录

    static function autoload($class)
    {

        //包含命名空间的字符串
        //自动载入类:
        //echo "auto load the class :" . $class . PHP_EOL;
        require_once BASEDIR.DIRECTORY_SEPARATOR.str_replace("\\","/",$class).".php";
    }

}