<?php

//redis的基础类库，为了防止每次连接都生成连
namespace  app\common\lib;

class Redis{
    /**
     * 验证码的前缀
     * @var string
     */
    public  static $pre = "sms_";

    /**
     * 用户key
     * @var string
     */
    public static $userper="user_";

    /**
     * 存储验证码的key名
     * @param $phone
     * @return string
     */
    public  static function smsKey($phone){
            return self::$pre.$phone;
    }
    public  static  function userKey($phone){
        return self::$userper.$phone;
    }
}