<?php

namespace Dc;


use App\Api\Controller;

class App
{
    public function Run()
    {
        echo "Runing" . PHP_EOL;

        //加载路由注解

        $http_server = new \swoole_http_server('0.0.0.0', 9999);
        $http_server->on("start", function ($server) {
            echo "swoole http server is started at http://localhost:9999" . PHP_EOL;
            //var_dump($server);
            $this->init();
            $this->initRouteAnnotation();
        });
        $http_server->on("request", function ($request, $response) {
            $response->header("Content-Type", "application/json");
            if ($request->server ['path_info'] == "test") {
                //扫描注解，找到控制器
                //执行控制器中的方法
            }
            $response->end("Hello World\n");
        });
        $http_server->start();
    }

    protected function test()
    {

        $start = memory_get_usage();
        echo $start . PHP_EOL;
        $j = 1;
        for ($i = 0; $i <= 100000000; $i++) {
            $j++;
        }
        $end = memory_get_usage();
        echo $end . PHP_EOL;

        echo $use = $end - $start;
        echo PHP_EOL;

    }

    /**
     * 加载注解组件
     */
    public function initRouteAnnotation()
    {
        //扫描目录下的文件
        $dirs = glob(APP_PATH . "/Api/controller/*");
        if (!empty($dirs)) {
            foreach ($dirs as $file) {
                if (file_exists($file)) {
                     $file_name = basename($file,".php");
                     //获取文件
                    $object = new Controller\indexController();
                    var_dump($object);
                    $re_object = new \ReflectionClass($object);
                    $class_comment  = $re_object->getDocComment();
                    //找到Controller注解
                    $class_regex = '#@Controller\((.*)\)#i';
                    preg_match($class_regex,$class_comment,$controller_info);
                    var_dump($controller_info);
                    //var_dump($doc_comment);
                    //var_dump($re_object->getMethods());
                    foreach ($re_object->getMethods() as $method) {
                        $method_comment = $method->getDocComment();
                        $method_regex = '#RequestMapping\((.*)\)#i';
                        preg_match($method_regex,$method_comment,$method_info);
                        var_dump($method_info);
                       // var_dump($method->getDocComment());
                    }

                } else {
                    echo date("Y-m-d H:i:s") . " not found $file" . PHP_EOL;
                }
            }
        } else {
            echo "empty dirs :" . APP_PATH . "/Api/controller/*";
            return false;
        }
    }

    /**
     * self-swoft初始化
     */
    public function init()
    {
        define("ROOT_PATH", dirname(dirname(__DIR__))); //root dir
        define("APP_PATH", ROOT_PATH . "/application");    //app dir
    }

    /**
     * parse class
     */
    public function parseClass(){

    }

    public function parseMethod(){

    }
}