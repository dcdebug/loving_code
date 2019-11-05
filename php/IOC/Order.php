<?php
namespace  IOC;

class Order {


    private  $db; //db driver


    public  function __construct(DbDriver $dbdriver)
    {
        echo "aaaaaaaaa";

        $this->db= $dbdriver;
        var_dump($dbdriver);
    }


    public  function add(){
        //$this->db->insert();
        $this->db->add();
    }
}