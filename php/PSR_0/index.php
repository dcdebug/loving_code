<?php

//PSR-0 规范 :入口文件
//定义网站的根目录

define("BASEDIR", __DIR__);

//引入自动加载文件
include BASEDIR . "/Common/Loader.php";
//自动加载函数注册
spl_autoload_register("\Common\Loader::autoload");



/*$db = new Common\Database();*/
//传统的方式
/*$db->where("id =3 ");
$db->where("name =3 ");
$db->order("id desc ");
$db->limit(" 10 ");*/
//链试方式
//这是解决练市访问的关键
/*$db->where("id = 3")->where("name = 3")->order("id desc")->limit(11);

$object = new Common\Objects();*/

//访问一个对象不存在的属性
//$object->title = "成越";

//echo $object->title.PHP_EOL;

//调用一个不存在的函数

//$object -> getTest("hello ",array(3,32432,342432));
//会显示方法不存在的错误提示

//调用一个不存在的静态方法

//Common\Objects::getFun("hello abc",array(1,3,34));
//将一个对象以字符串的形式输出
/*var_dump($object);*/

/*echo $object;

echo $object("test1222222222222222");*/

//database connect
$host = "localhost";
$user = "root";
$password ="iServer123";

$dbname = "upmngr";
/*$db = new Common\Database\Mysql($host,$user,$password,$dbname);
$result = $db->query("show databases;");
var_dump($result);


$db->close();*/

/*$pdo_db = new Common\Database\Pdo($host,$user,$password,$dbname);
var_dump($pdo_db);

$result = $pdo_db->query("show databases;");

var_dump($result);


$pdo_db->close();*/

//mysqlid
//直接读取注册树中的独享

/*$global_factory_objects = new \Common\Factory();

$db = \Common\Register::get("mysqli_db");
$result = $db->query("show databases;")->get_array();

var_dump($result);

die;
var_dump($db);
die;*/

//Common\Objects::test();


//App\Controller\Home\Index::test();


//关于适配器模式,
//使用的时候,只需要在使用Mysqli,mysql,pdo的时候new 对应的类就可以了,本次的代码我进行了合并,
//适配器模式对于不同的数据库链接都是采用同样的方法,也就是connect->query->close等等其他操作
//而使用者不需要知道具体后台如何实现的
class Page{


    protected  $strategy;
    function index(){

        //没有实用策略模式,那么是这样实用
 /*       if(isset($_GET['female'])){
            new \Common\FemaleUserStrategy();
        }else if(isset($_GET['male'])){
            new \Common\MaleUserStrategy();
        }else{
            //.............
        }*/
        //使用策略模式的话,这样使用
        //直接调用策略的相关方法
        echo "ad".PHP_EOL;
        $this->strategy->showAd();

        echo "category".PHP_EOL;
        $this->strategy->showCategory();
    }
    function setStrategy( \Common\UserStrategy $strategy){
            $this->strategy = $strategy;
    }
}
$page = new Page;

if(isset($_GET['female'])){
    $strategy = new \Common\FemaleUserStrategy();
}else{
    $strategy = new \Common\MaleUserStrategy();
}

//设置策略
$page->setStrategy($strategy);
$page->index();