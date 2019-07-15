<?php

//PSR-0 规范 :入口文件
//定义网站的根目录

define("BASEDIR", __DIR__);

//引入自动加载文件
include BASEDIR . "/Common/Loader.php";
//自动加载函数注册
spl_autoload_register("\Common\Loader::autoload");



$db = new Common\Database();
//传统的方式
/*$db->where("id =3 ");
$db->where("name =3 ");
$db->order("id desc ");
$db->limit(" 10 ");*/
//链试方式
//这是解决练市访问的关键
$db->where("id = 3")->where("name = 3")->order("id desc")->limit(11)
Common\Objects::test();


App\Controller\Home\Index::test();
