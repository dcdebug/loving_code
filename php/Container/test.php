<?php

class Message{

    public  function seed(){
        return "seed email";
    }
}
//订单操作，需要发送消息

class Order{

    protected  $messager="";//发送消息对象

    function __construct()
    {
        $this->messager = new Message();
    }

    public  function seed_msg(){
        return $this->messager->seed();
    }
}

$Order = new Order();

$Order->seed_msg();

