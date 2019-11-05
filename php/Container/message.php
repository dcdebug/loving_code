<?php
interface Message{
    public  function seed();
}

class SeedEmail implements  Message{

    public function seed(){
        return "send email";
    }
}

class SeedSMS implements  Message{

    public  function seed(){
        return "send sms";
    }
}

class Order{

    protected  $messager= "";

    function  __construct(Message $message)
    {
        $this->message = $message;

    }

    function seed_msg(){
        return $this->messager->seed();
    }
}

//发送邮件
$Order = new Order(new SeedEmail());

$Order->seed_msg();

$Order_sms = new Order(new SeedSMS());
$Order_sms->seed_msg();
