<?php

$server = new swoole_server("127.0.0.1",9501);
$server ->set([
    'worker_num'=>4,//workers  进程数，cpu 1-4倍
    'daemonize' => true,
    'max_request'=>10000,
    ]);
//监听连接进入事件
/**
 * $fd 客户端连接的唯一标识
 * $reactor_id :线程id
 */
$server->on("connect",function($server,$fd,$reactor_id){
    echo "Client :{$reactor_id} - {$fd} - connect.\n";
});
//监听serverr的数据接受事件
$server->on("receive",function($server,$fd,$reactor_id,$data){
        $server->send($fd,"Server :{$reactor_id} - {$fd}\n the data is ".$data);
});
//监听连接关闭事件
$server->on("close",function($server,$fd){
    echo "Client :Close.\n";
});

//启动服务器
$server->start();

//netstat -lnp |grep -i 9501
//tcp        0      0 127.0.0.1:9501          0.0.0.0:*               LISTEN      18126/php

