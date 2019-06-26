<?php

class Http{

    CONST HOST = '0.0.0.0';
    CONST PORT = 88;
    public $http = null;


    public function __construct()
    {
        $this->http = new \Swoole_http_server(self::HOST,self::PORT);

        $this->http->set([
            'enable_static_handler'=>true,
            'document_root'=>__DIR__."/../public/",
            'worker_num'=>6,
            'task_worker_num'=>5,

        ]);
    }
}