<?php
namespace  Common\Database;

use Common\IDatabase;


class Mysql implements  IDatabase {



    protected  $conn;

    function connect($host,$user,$password,$dbname){

        $this->conn = mysql_connect($host,$user,$password);
        mysql_select_db($dbname,$this->conn);


    } //数据库链接
    function query($sql){
       return  @mysql_query($sql,$this->conn);
    } //数据库查询
    function close(){
        mysql_close($this->conn);
    } //数据库关闭

}