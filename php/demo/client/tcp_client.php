<?php

//连接 swoole tcp服务
//创建一个客户端
$swoole_client = new swoole_client(SWOOLE_SOCK_TCP);

//连接
if($swoole_client->connect("127.0.0.1",9501)){
    echo "连接成功\n";
    //php cli常量?总结
    fwrite(STDOUT,"请输入消息:");
    $msg = trim(fgets(STDIN));
    //即将消息发送给server端
    $result=$swoole_client->send($msg);
    if($result){
        $result_from_server = $swoole_client->recv();
        var_dump($result_from_server);
    }else{
        echo "发送消息失败\n";
        die;
    }
    die;
}else{
    echo "连接失败\n";
    die;
}
