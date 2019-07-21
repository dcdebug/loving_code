<?php
namespace  Common;

use Common\Database;
class  Factory{



    //不使用工程模式,就要去new 对象


    /**
     * 创建数据库对象
     * @return Database
     */
    static function createDatabase(){
        return new Database(); //工厂模式,工厂方法中new
    }
    static function getDatabase(){
        return Database\Mysqli::getInstance();
    }

    //注册模式,
/*    public  function __construct()
    {
        $db = Database\Mysqli::getInstance();

        //注册到全局变量模式中
        Register::set("mysqli_db",$db);

        return $db;

        //使用注册模式将独享
        $the_object_of_you_need = Register::get("db1");

    }*/


}