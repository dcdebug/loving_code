<?php

class Websocket_task
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
            //work进程数量
            'worker_num'=>2,
            //task任务数量
            'task_worker_num'=>2,
        ]);
        $this->ws->on("open",[$this,"onOpen"]);
        $this->ws->on("message",[$this,"onMessage"]);
        $this->ws->on("task",[$this,"onTask"]);
        $this->ws->on("finish",[$this,"onFinish"]);
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
            echo date("Y-m-d H:i:s")." the client id :".$frame->fd." send the message is ".$frame->data."\r\n";
            //10s的时间去处理这个时间
            $data=[
                'task'=>1,
                'fd'=>$frame->fd
            ];
            $ws->task($data);
            $ws->push($frame->fd," Hi, ".$frame->fd." ,I receive the message: thank you !");
    }

    /**
     function onTask(swoole_server $serv, int $task_id, int $src_worker_id, mixed $data);
    $task_id是任务ID，由swoole扩展内自动生成，用于区分不同的任务。$task_id和$src_worker_id组合起来才是全局唯一的，不同的worker进程投递的任务ID可能会有相同
    $src_worker_id来自于哪个worker进程
    $data 是任务的内容
     * @param $data
     * @param int $dst_worker_id
     */
    function onTask($ws,$task_id,$src_worker_id,$data){
        //$data
        print_r($data);
        //耗时的场景
        sleep(10);
        return "on task finish"; //告诉work进程，任务完成
    }

    //作用于finish函数
    //$data 是onTask返回的内容
    function onFinish($ws,$task_id,$data){
        echo "task Id :{$task_id}";
        echo "finish-data-success:".$data;

    }
    function onClose($ws,$fd){
            echo date("Y-m-d H:i:s")." Client id :{$fd} close the connect;\r\n";
    }
}

//实例化对象
$websocket = new Websocket_task();