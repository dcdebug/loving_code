<?php
namespace app\index\controller;

//引入common类库
use app\common\lib\ali\Sms;
use app\common\lib\Util;
use app\common\lib\Redis;

class Index
{
    public function index()
    {


        echo "index";
        return true;
        //return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5.1<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
    }
    public function hello($name = 'ThinkPHP5')
    {
        echo "<pre>";
        print_r($_GET);

        return 'hello,' . $name;
    }
    function swoole_hello(){
        echo "swoole_hello".PHP_EOL;
        return true;
    }

    function sms(){
        //$telephoneNum =request()->get("phone_num",0,'intval');
        //上述是有bug,永远会记录第一次你输入的手机号码
        //当初的解决方案是修改那个path以及pathinfo
        //我们还可以将thinkphp的一些基础文件在request的回调函数中进行加载，如果用这种情况的话与php-fpm很类似，相对于以前有那么一点损耗
        //但是不会特别大，可以自行进行评估


        $telephoneNum =$_GET["phone_num"];

        if(empty($telephoneNum)){
            //status 0,1 message ，data
            return Util::show(config('show.error'),'empty telephone');
        }
        //生成一个随机数
        $telephone_code = rand(100000,999999);
        $telephone_code = 888888;
        //写入redis中，使用swoole 的swoole 的异步redis
            $response= array();
            $taskData =[
                //对于task列表的优化:
                'method'=>'sendSms',
                'data'=>[
                    'phone_num'=>$telephoneNum,
                    'code'=>$telephone_code
                ]
                /*'phone_num'=>$telephoneNum,
                'code'=>$telephone_code*/
            ];
            $_POST['http_server']->task($taskData);
        //将下面的内容放到task中去
        return  Util::show(config('show.success'),"阿里云发送验证码成功");

       try{
                $response=Sms::sendSms($telephoneNum,$telephone_code);
                $response['code'] = "OK";
            }catch (\Exception $e){
                return Util::show(config('show.error'),'error:'.$e->getMessage());
            }
            if($response['code'] === 'OK'){
                //写入redis中，使用swoole 的swoole 的异步redis
                //此部分写入到redis中，异步处理，可以写成一个基础类库，类似Util

                //也就是将这一部分直接扔到task任务重去执行

                $redis = new \Swoole\Coroutine\Redis();
                $redis->connect(config('redis.host'),config('redis.port'),config("redis.expire_time"));
                //$redis->set("sms_".$telephoneNum,$telephone_code);

                $redis->set(Redis::smsKey($telephoneNum),$telephone_code,config('redis.expire_time'));

                //redis这一个部分可以抽取处理，成为一个功能类。
                //分布式的时候，这种会出现错乱。
                //异步redis ，但是已经被swoole弃用，不再考虑

                return  Util::show(config('show.success'),"阿里云发送验证码成功");
            }else{
                return Util::show(config('show.error'),"阿里云验证码发送失败");

            }
    }
}
