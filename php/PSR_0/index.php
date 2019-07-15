<?php

//PSR-0 规范 :入口文件
//定义网站的根目录

define("BASEDIR", __DIR__);

//引入自动加载文件
include BASEDIR . "/Common/Loader.php";
//自动加载函数注册
spl_autoload_register("\Common\Loader::autoload");

Common\Objects::test();


App\Controller\Home\Index::test();
