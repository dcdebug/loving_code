<?php

//PSR-0 规范 :入口文件
//定义网站的根目录


ini_set("display_errors",E_ALL);

define("BASEDIR", __DIR__);

//引入自动加载文件
include BASEDIR . "/Common/Loader.php";
//自动加载函数注册
spl_autoload_register("\Common\Loader::autoload");


echo "自动加载配置<br/>";


$config = new Common\Config(__DIR__."/Config");

//注意,这个config是不写key是不加载的
//写了key会自动加载对应的key
echo "<pre>";
var_dump($config['database']);
echo "<pre>";

var_dump($config['Controller']);

die;
//代理模式

//如果mysql实现读写分离,可以采用:
/*$db = \Common\Factory::getDatabase("slave");
$result = $db->query('select sql');

//如果是写
$db = \Common\Factory::getDatabase("master");

$result = $db->query("update sql");*/
//如果采用代理模式
//创建IUserProxy 接口
//proxy 实现IUserProxy接口

$proxy = new Proxy();

//读
$proxy ->getUsername(1);

//写
$proxy ->setUsername(1,'aaa');


die;
echo "迭代器模式<br/>";
$users = new \Common\AllUser();

foreach( $users as $user){
    echo "<pre>";
    var_dump($user);

}
die;
//装饰器模式
//场景需求:在不改变draw类的情况,修改画布的颜色或者字体
echo "装饰器模式<br/>";
class Canvas2 extends  Common\Canvas{
    public  function draw(){
        echo "<div style='color:red'>";
        parent::draw();
        echo "</div>";
    }
}
$canvas2 = new Canvas2();
$canvas2->init();
$canvas2->rect(3,6,4,12);
$canvas2->draw();
//采用装饰者模式
echo "采用装饰器模式<br/>";
$canvas2 = new Common\Canvas();

//增加装饰
$canvas2 ->addDecorator(new \Common\ColorDecorator('green'));
//控制文字大小的
$canvas2->addDecorator(new \Common\SizeDecorator(25));
$canvas2 ->init();
$canvas2->rect(3,6,4,12);
$canvas2 ->draw();


die;
//原型模式
/*$canvas1 =new Common\Canvas();

$canvas1 ->init();


$canvas1 ->rect(3,6,4,12);
$canvas1 ->draw();


echo "=============================<br/>";


$canvas2 =new Common\Canvas();

$canvas2 ->init();


$canvas2 ->rect(3,6,4,12);

$canvas2 ->draw();*/

//由于每一次创建对象都会进行for循环,创建一个对象对资源的小号过大
//采用原型模式的处理如下:
echo "原型模式处理<br/>";

$porotype =new Common\Canvas();

$porotype ->init();

$canvas1 = clone $porotype;
$canvas1 ->rect(3,6,4,12);
$canvas1 ->draw();


echo "=============================<br/>";


$canvas2 = clone $porotype;

$canvas2 ->init();


$canvas2 ->rect(3,6,4,12);

$canvas2 ->draw();

die;
$canvas1->draw();


die;


















/*class Event{
    function trigger(){

        echo "event";//事件发生时的后续处理逻辑
        echo"<br/>"; //
    }
}*/
class Event extends  Common\EventGenerator{

    public function trigger(){
        //对观察者通知;
        echo "event trigger"."<br/>";
        $this->notify();
        //当前没有观察者

    }
}
//增加观察者
class Observer1 implements  Common\Observer{

      function update($event_info = null){
        echo "逻辑 1"."<br/>";

    }
}

class Observer2 implements  Common\Observer{

    function update($event_info = null){
        echo "逻辑 2"."<br/>";

    }
}
$event = new Event();
//将观察者加入到监听列表中
$event->addObject(new Observer1());
$event->addObject(new Observer1());
$event->addObject(new Observer1());
$event->addObject(new Observer1());
$event->addObject(new Observer1());
$event->addObject(new Observer1());
$event->addObject(new Observer2());
$event ->trigger();

die;
//获取数据库的信息
//$mysql_version_info = (new Common\Database\Mysqli())->mysqli_version();
/*$mysql_version_info = Common\Database\Mysqli::getInstance();
$mysql_version_info = $mysql_version_info->mysqli_version();
var_dump($mysql_version_info);
die;*/

//委托

/*
class Event{


}

die;*/


//使用对象模式完成更复杂的对象映射

class Page{


    public  function index(){
        //$user = new App\Model\User(1);
        $user = Common\Factory::getUser(1);
        $user->name = "new".time();
        $this->test();
    }

    public  function test(){
        //$user = new App\Model\User(1);
        $user = Common\Factory::getUser(1);
        $user->mobile = '17607670500';
        $user->regtime = time();
        //$user = new App\Model\User(1);

    }
    //上面的代码实例化了两个代码,我们完全可以使用工厂模式将这个类的实例给抽离出来,防止参数变化的时候
    //会出现代码多个地方的修改
    //修改为工厂模式以后,发现还是有问题,就是new了两次对象,这个时候我们考虑在工厂方法里面采用注册器模式,注意,采用test函数传递$user对象,仍旧会有传递成本
    //如下:
    //参考工厂模类里面的getUser方法

}

$page = new Page();

$page ->index();

die;







//===使用对象模式完成更复杂的对象映射

//调用user模型
$user = new \App\Model\User(1);

//修改对象的值
$user->name = 'Deary';
$user->mobile = 17095053557;
$user->regtime = time();
print_r($user);
die;
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