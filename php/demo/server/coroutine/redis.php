<?php
//错误案例：
/*$redis =  new Swoole\Coroutine\Redis();
$redis ->connect("localhost",6379);
$result=$redis->get($key);
print_r($result);*/
//参考http_server.php脚本

$http =new swoole_http_server("0,0,0,0",81);
$http->on("request",function($request,$response){
    //获取redis的信息
   $redis  = new Swoole\Coroutine\Redis();
   $redis->connect('127.0.0.1',6379);
   $value = $redis->get($request->get['a']);
   $response->header('Content-Type',"text/plain");
   $response->end($value);

    //协程的响应时间计算
    //time = max(redis,mysql)即可。
});

$http->start();
$http->start();

