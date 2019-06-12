<?php
$http = new swoole_http_server("127.0.0.1",81);
$http->set([
    'worker_num'=>2,
    'enable_static_handler'=>true, //静态html支持
    'document_root'=>'/home/darrykinger/desiger_model/php/swoole/thinkphp/public/static', //静态界面目录
]);
//使用workstart 热加载 thinkphp
$http->on("WorkerStart",function(swoole_server $server,$worker_id){
        //没有必要执行处理request的功能，那样的话代码就执行 了 ，我们只需要加载thinkphp启动需要基本 信息即可
    // 定义应用目录
    define('APP_PATH', __DIR__ . '/../application/');
    require __DIR__ . '../thinkphp/base.php';
    //require __DIR__ . '/../thinkphp/start.php';
});
$http->on("request",function($request,$response){

    //将swoole的$request  转换为$_SERVER;
    if(isset($request->get)){
        foreach($request->get as $k=>$v){
            $_SERVER[$k]=$v;
        }
    }
});
$http->start();