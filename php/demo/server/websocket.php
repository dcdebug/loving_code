<?php

$websocket = new swoole_websocket_server("0.0.0.0",9501);

$websocket->set([
    'enable_static_handler'=>true, //静态html支持
    'document_root'=>'/home/darrykinger/desiger_model/php/swoole/demo/html', //静态界面目录
]);
$websocket ->on("open","onOpen");//当WebSocket客户端与服务器建立连接并完成握手后会回调此函数。
function onOpen($websocket,$request){
    print_r($request->fd);
}
$websocket->on("message",function($websocket,$frame){
    echo "receive from ".print_r($frame,true);
    //push 推送数据，最大为2m
    //
    $websocket->push($frame->fd,print_r($frame,true)." this is from server ");
});

//关闭websocket服务
$websocket->on("close",function($ser,$fd){
    echo "client {$fd} closed\n";
});
$websocket->start();
