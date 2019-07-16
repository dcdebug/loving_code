<?php

namespace  Common\Database;

use Common\IDatabase;

class Pdo implements  IDatabase{


    protected  $conn;

    function connect($host,$user,$password,$dbname){
        $dsn = "mysql:dbname={$dbname};host={$host};";

        try{
            //dsn
            $this->conn = new \PDO($dsn,$user,$password,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')
            );

            var_dump($this->conn);

        }catch (\PDOException $e){
            echo "Connect failed: ".$e->getMessage();
        }
    } //数据库链接
    function query($sql){
        return $this->conn->query($sql);
    } //数据库查询
    function close(){
            unset($this->conn);
    } //数据库关闭

}