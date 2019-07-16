<?php
namespace  Common;

//下面的代码是关于数据库的链式操作
class Database{

    function where($str){
            //实现链式操作sql
        return $this;
    }
    function order($str){
        return $this;
    }
    function limit($str){
        return $this;
    }

}