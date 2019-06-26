<?php
//主要用来处理php操作redis


namespace  app\common\lib;
class Predis{

    //单例模式.避免了多次连接redis带来的消耗

    private  static $_instance= null;

    public  $redis= "";

    public  static function getInstance(){
        if(empty(self::$_instance)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    private  function __construct()
    {
        $this->redis = new \Redis();
        $result = $this->redis->connect(config('redis.host'),config('redis.port'),config('redis.connect_timeout'));
        //判断是否连接成功
        if($result === false){
            throw new \Exception('redis connect error');
        }
    }

    //
    public  function set($key,$value ,$time=0){
        if(!$key){
            return '';
        }
        if(is_array($value)){
            $value = json_encode($value);
        }
        if(!$time){
            return $this->redis->set($key,$value);
        }

        return  $this->redis->setex($key,$time,$value);

    }

    public  function get($key){
        if(!$key){
            return '';
        }
        return $this->redis->get($key);

    }
}
