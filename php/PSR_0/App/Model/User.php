<?php
namespace  App\Model;

use Common\Database\Mysqli;

class User{
    //数据映射为对象

    protected  $db;
    //数据库的字段

    public  $id;
    public  $name;
    public  $mobile;
    public  $regtime;

    public  function __construct()
    {
        $this->db=  Mysqli::getInstance();

        $result = $this->db->query('select * from user limit 1');
        $result = $result->get_array();

        var_dump($result);

    }
}