<?php

class Websocket
{


    CONST HOST="0.0.0.0";
    CONST PORT=81;
    public $ws = null;
    public  function  __construct()
    {
        $this->ws = new swoole_websocket_server(self::HOST,self::PORT);
        //设置启动参数
        $this->ws->set([
            'enable_static_handler'=>true, //静态html支持
            'document_root'=>'/home/darrykinger/desiger_model/php/swoole/demo/html', //静态界面目录
        ]);
        $this->ws->on("open",[$this,"onOpen"]);
        $this->ws->on("message",[$this,"onMessage"]);
        $this->ws->on("close",[$this,"onClose"]);
        $this->ws->start();
    }
    /*
     * 监听ws的连接事件
     */
    function onOpen($ws,$request){
        //请求的数据
        echo date("Y-m-d H:i:s")." client id :".$request->fd." connect me success\r\n";
        //var_dump($ws);
        //echo date("Y-m-d H:i:s")." client connect success";
        //var_dump($request);
    }
    //监听message事件
    function onMessage($ws,$frame){
        var_dump($frame);
            echo date("Y-m-d H:i:s")." the client id :".$frame->fd." send the message is ".$frame->data."\r\n";
            $ws->push($frame->fd," Hi, ".$frame->fd." ,I receive the message: thank you !");
    }

    function onClose($ws,$fd){
            echo date("Y-m-d H:i:s")." Client id :{$fd} close the connect;\r\n";
    }
}

//实例化对象
$websocket = new Websocket();