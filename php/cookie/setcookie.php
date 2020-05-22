<?php


$http_server = new swoole_http_server('0.0.0.0',9998);

$http_server->on("request",function($request,$response){

            setcookie("dc","chengyue");
            echo "start";

            $request->cookie['aaaaa'];
            
            $response->end("hello world");
});
$http_server->start();
