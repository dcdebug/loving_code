<?php
//对于在    $http_think->close();的时候，console平台会出现报错的问题，
//swoole在代码中关闭了$http_think ,但是有重新重启了进程使其整体能够满足：worker_num的
$http_think = new swoole_http_server('0.0.0.0',88);

$http_think->set(
    [
        'enable_static_handler'=>true,
        'document_root'=>__DIR__."/../public/",
        'worker_num'=>6
    ]
);

//预加载基本的thinkphp的基础库
$http_think->on("WorkerStart",function(swoole_server $server,$worker_id){

    //thinkphp 基础的文件
    //定义应用目录
    define('APP_PATH', __DIR__ . '/../application/');
    //加载框架里面的文件
    require __DIR__ . '/../thinkphp/base.php';
    //require __DIR__ . '/../thinkphp/start.php';

});

//当有上一次的请求处理完成以后，其哪些请求信息以及响应信息并没有在内存中被 注销掉，
//因此，我们对thinkphp的优化的时候，就要考虑注销掉这些信息

$http_think->on("request",function($request,$response) use ($http_think){
    //$request 请求处理
    //$response 返回给client端的
    //转换成原生的$REQESTduixiang

    if(isset($request->request)){
        foreach($request->request as $k=>$value){
            $_SERVER[strtoupper($k)]=$value;
        }
    }
    //header头
    if(isset($request->header)){

        foreach($request->header as $key=>$value){
            $_SERVER[strtoupper($key)]=$value;
        }
    }
    $_GET=array(); //全局变量没有释放哦
    if(isset($request->get)){
        foreach($request->get as $key=>$value){
            $_GET[$key]=$value;
        }
    }

    if(isset($request->post)){
        foreach($request->post as $key=>$value){
            $_POST[$key]=$value;
        }
    }

    //输出内容到缓存区
    ob_start();
    try{
        // 执行应用并响应
        think\Container::get('app', [defined('APP_PATH') ? APP_PATH : ''])
            ->run()
            ->send();

    }catch (\Exception $e){
        var_dump($e);
    }
    $response_thinkphp_res = ob_get_contents();
    ob_end_clean();
    $response->end($response_thinkphp_res);

});

$http_think->start();