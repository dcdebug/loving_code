<?php

interface Message{
    public function seed();
}


class SendEmail implements  Message{
    public function seed()
    {
        return "send email";
        // TODO: Implement seed() method.
    }
}

class SendSms implements  Message{

    public function seed(){
        return "seed sms";
    }
}

//服务器容器

class Container {

    protected  $binds;

    protected $instances;

    public  function bind($abstract,$concrete){

    if($concrete instanceof Closure){
        $this->binds[$abstract] = $concrete;
    }else{
        $this->instances[$abstract] = $concrete;
    }
    }

    public function make($abstract ,$parameters = array()){
        if(isset($this->instances[$abstract])){
            return $this->instances[$abstract];
        }

        array_unshift($parameters,$this);
        return call_user_func_array($this->binds[$abstract],$parameters);
    }
}

//创建一个消息工厂

$container = new Container();
//消息绑定到工厂里面
$container->bind("SMS",function(){
    return new SeedSMS();
});
//邮件写入到容器
$container->bind("email",function(){
    return new SeedEmail();
});

print_r($container);

//发送消息
$sms = $container->make("SMS");

$sms->seed();

//将发送消息