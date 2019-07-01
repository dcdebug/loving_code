<?php
/**
 * Created by PhpStorm.
 * User: darrykinger
 * Date: 7/2/19
 * Time: 12:13 AM
 */
namespace  app\common\task;

use app\common\lib\ali\Sms;
use app\common\lib\Predis;
use app\common\lib\Redis;
class Task{


    public  function sendSms($data){
        try{
            $response= Sms::sendSms($data['phone_num'],$data['code']);
            if($response['code'] == "OK"){
                //
                Predis::getInstance()->set(Redis::smsKey($data['phone_num']),$data['code'],config('redis.expire_time'));
            }else{
                //todo
                echo "阿里云发送验证码失败".PHP_EOL;
            }
            //$response['code'] = "OK";
        }catch (\Exception $e){
            echo $e->getMessage();

            //return Util::show(config('show.error'),'error:'.$e->getMessage());
        }

    }
}