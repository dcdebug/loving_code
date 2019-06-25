<?php

namespace app\index\controller;

//引入common类库
use app\common\lib\Util;
use app\common\lib\Redis;
use app\common\lib\Predis;


class Login{
        public  function index(){
            //获取手机号码和验证码
            $telephone = intval($_GET['phone_num']);
            $code  = intval($_GET['code']);

            if(empty($telephone)||empty($code)){
                return Util::show(config('show.error'),'phone or code require;');
            }
            try{
               // var_dump(unserialize(0)); //unserialize(): Error at offset 0 of 1 bytes
                $redisCode = unserialize(Predis::getInstance()->get(Redis::smsKey($telephone)));
               // var_dump($redisCode);
                //var_dump(unserialize($redisCode));
            }catch(\Exception $e){
                return Util::show(config('show.error'),$e->getMessage());
            }
            if($redisCode == $code){
                //
                $data =[
                    'user'=>$telephone,
                    'srcKey'=>md5(Redis::userKey($telephone)),
                    'time'=>time(),
                    'isLogin'=>true
                ];
                Predis::getInstance()->set(Redis::$userper,$data);
                return Util::show(config('show.success'),'success',$data);
            }else{
                return Util::show(config('show.error'),'login error');

            }
            //redis中是否有验证码

            //注意点：redis查数据，基于redis的查询数据，就不能用异步redis了，
            //需要安装redis扩展

        }

    /**
     * 用户登录后的首页
     */
        public  function uindex(){

            //
            echo "登录成功";
        }
}
