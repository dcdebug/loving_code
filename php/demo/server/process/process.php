<?php

//进程与进程之间的通信是通过管道通信的
$process  = new swoole_process(function(swoole_process $prcess){
            //业务逻辑
    echo 'a'.PHP_EOL;
    //开启http server
    //类似linux下执行 php  redis.php
    $sub_pid=$prcess->exec("/usr/bin/php",[__DIR__."/../http_server.php"]);
    var_dump($sub_pid);
},false,true); //第二个参数，false输出到控制台，true，会进入 管道


$pid=$process ->start();
echo  "pid :".$pid.PHP_EOL;

swoole_process::wait(); //并不会结束

