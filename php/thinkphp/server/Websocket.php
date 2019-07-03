<?php

/**
 * 将面向过程转换成面向对象
 * Class Http
 */
class Websocket
{
    CONST HOST = '0.0.0.0';
    CONST PORT = 88;

    public $ws =null;
    public  function __construct()
    {
        $this->ws = new swoole_websocket_server(self::HOST,self::PORT);
        $this->ws->set([
            'enable_static_handler'=>true,
            'document_root'=>"/home/darrykinger/loving_code/php/thinkphp/public/",
            'worker_num'=>6,
            'task_worker_num'=>5,

        ]);

        //注册一些http事件
        $this->ws->on("open",[$this,'onOpen']);
        $this->ws->on("message",[$this,'onMessage']);
        $this->ws->on('workerstart',[$this,"onWorkerStart"]);
        $this->ws->on('request',[$this,"onRequest"]);
        $this->ws->on('task',[$this,"onTask"]);
        $this->ws->on('finish',[$this,"onFinish"]);
        $this->ws->on('close',[$this,"onClose"]);
        $this->ws->start();
    }

    /*
 * 监听ws的连接事件
 */
    function onOpen($ws,$request){
       var_dump($request->fd);

    }
    //监听message事件
    function onMessage($ws,$frame){
        var_dump($frame);
        echo date("Y-m-d H:i:s")." the client id :".$frame->fd." send the message is ".$frame->data."\r\n";
        $ws->push($frame->fd," Hi, ".$frame->fd." ,I receive the message: thank you !");
    }




    /**
     * workerstart回调
     * @param $server
     * @param $worker_id
     */
    public function onWorkerStart($server,$worker_id){

        //thinkphp 基础的文件
        //定义应用目录
        define('APP_PATH', __DIR__ . '/../application/');
        //加载框架里面的文件
        //task中的内容
        require __DIR__ . '/../thinkphp/base.php';
        //require __DIR__ . '/../thinkphp/start.php';
    }

    /**
     * request回调
     * @param $request
     * @param $response
     */
    public  function onRequest($request,$response){
        //$request 请求处理
        //$response 返回给client端的
        //转换成原生的$REQESTduixiang
        $_SERVER=[];
        if(isset($request->server)){
            foreach($request->server as $k=>$value){
                $_SERVER[strtoupper($k)]=$value;
            }
        }
        //header头
        if(isset($request->header)){
            foreach($request->header as $key=>$value){
                $_SERVER[strtoupper($key)]=$value;
            }
        }
        $_GET=[]; //全局变量没有释放哦
        if(isset($request->get)){
            foreach($request->get as $key=>$value){
                $_GET[$key]=$value;
            }
        }
        $_POST=[];

        if(isset($request->post)){
            foreach($request->post as $key=>$value){
                $_POST[$key]=$value;
            }
        }
        $_POST['http_server']=$this->ws;


        //var_dump($this->ws);
        //$_POST=['http_server']=$this->ws; //在项目中就可以通过
        //http_server进行访问
        //将$this->ws变量传递给项目中使用
        //输出内容到缓存区
        ob_start();
        $this->__common_thinkphp();
        $response_thinkphp_res = ob_get_contents();
        ob_end_clean();
        $response->end($response_thinkphp_res);
    }


    public  function onTask($server,$taskID,$workerid,$data){

        //return 之后的是没有做任务分发之前的,优化之后
        //任务分发
        $this->__common_thinkphp();


        if(isset($data['method'])&&$data['method']){

            $task_method = $data['method'];

            $task_object  = new app\common\task\Task();
            $task_object->$task_method($data['data']);

        }else{

            echo "new the parameter :method".PHP_EOL;

        }



        return  true;
        //将workerstart中引入start.php文件
        //引入Sms
        $this->__common_thinkphp();
        $sms = new app\common\lib\ali\Sms();
        try{
            $response= $sms::sendSms($data['phone_num'],$data['code']);
            if($response['code'] == "OK"){
                //

                app\common\lib\Predis::getInstance()->set(app\common\lib\Redis::smsKey($data['phone_num']),$data['code'],config('redis.expire_time'));

                /*        $redis = new \Swoole\Coroutine\Redis();
                        $redis->connect(config('redis.host'),config('redis.port'),config("redis.expire_time"));
                        //$redis->set("sms_".$telephoneNum,$telephone_code);

                        $redis->set(Redis::smsKey($data['phone_num']),$data['code'],config('redis.expire_time'));*/


            }else{
                //todo
                echo "阿里云发送验证码失败".PHP_EOL;

            }
            //$response['code'] = "OK";
        }catch (\Exception $e){
            echo $e->getMessage();

            //return Util::show(config('show.error'),'error:'.$e->getMessage());
        }
    }
    public function onFinish($server,$taskID,$data){
        echo "task Id :{$taskID}".PHP_EOL;
        echo "finish-data-success:{$data}".PHP_EOL;
    }

    public function onClose($server,$fd){
        echo "clientid:{$fd}".PHP_EOL;
    }

    /**
     * thinkphp 公用部分
     */
    public function __common_thinkphp()
    {
        try{
            // 执行应用并响应
            think\Container::get('app', [APP_PATH])
                ->run()
                ->send();

        }catch (\Exception $e){
            echo $e->getMessage().PHP_EOL;
        }
    }
}

new Websocket();
