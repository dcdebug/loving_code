<?php
$http = new swoole_http_server("127.0.0.1",81);
$http->set([
    'worker_num'=>2,
    'enable_static_handler'=>true, //静态html支持
    'document_root'=>'/home/darrykinger/desiger_model/php/swoole/demo/html', //静态界面目录
]);
$http->on("request",function($request,$response){
        //print_r($response->get(),true);
    $response->cookie("jenkins","darrykinger");
    $response->end("    <meta charset=\"UTF-8\">
<h1>Hello World333</h1>"."<h3>".print_r($request->get,true)."</h3>"."服务器端的信息:<h4>".print_r($request,true)."</h4>");
});
$http->start();