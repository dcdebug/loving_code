<?php
namespace  Common;

//下面是开始着手于适配器模式
interface  Database{
    function connect(); //数据库链接
    function query($sql); //数据库查询
    function close(); //数据库关闭
}
//下面的代码是关于数据库的链式操作
/*class Database{

    function where($str){
            //练市方式
        return $this;
    }
    function order($str){
        return $this;
    }
    function limit($str){
        return $this;
    }

}*/