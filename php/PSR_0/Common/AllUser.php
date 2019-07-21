<?php
namespace  Common;

class AllUser implements  \Iterator{


    protected  $ids;


    protected  $data = [];
    protected  $index;
    //取出所有的id
    public  function __construct()
    {
        //注册者模式
        //$db = Register::get("mysqli_db");
        $db = Factory::getDatabase();
        $result = $db ->query("select id,name from user;");
        $this->ids = $result->get_array();
    }

    public  function key()
    {
        return $this->index;
        // TODO: Implement key() method.
    }

    public  function next()
    {

        $this->index ++;
        // TODO: Implement next() method.
    }
    //当前的数据
    public function  current()
    {
        return $this->ids[$this->index];
        // TODO: Implement current() method.
    }
    //是否有数据,
    public  function valid()
    {
        return $this->index < count($this->ids);
        // TODO: Implement valid() method.
    }
    //移动到集合的开头
    public  function rewind()
    {
        $this->index =0;
        // TODO: Implement rewind() method.
    }
}