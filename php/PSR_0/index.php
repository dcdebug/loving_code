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
$db->where("id = 3")->where("name = 3")->order("id desc")->limit(11);

$object = new Common\Objects();

//访问一个对象不存在的属性
//$object->title = "成越";

//echo $object->title.PHP_EOL;

//调用一个不存在的函数

//$object -> getTest("hello ",array(3,32432,342432));
//会显示方法不存在的错误提示

//调用一个不存在的静态方法

//Common\Objects::getFun("hello abc",array(1,3,34));
//将一个对象以字符串的形式输出
var_dump($object);

echo $object;

echo $object("test1222222222222222");



die;

Common\Objects::test();


App\Controller\Home\Index::test();
