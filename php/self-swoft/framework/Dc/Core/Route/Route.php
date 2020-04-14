<?php

namespace  Dc\Route;

class Route{

    /**
     * Route info
     *  'get'=>[[
     *      'routepath'=>'index/index',
     *      'handle'=>'app\api\controller\indexCoteroller',
     *      ]
     * ],
     *  'post'=>[
     * }
     * @var array
     */
    static $route = [];

    /**
     * 添加route
     */
    public  static  function addRoute($method ,$routeinfo){
        self::$route[$method]=$routeinfo;
    }

    /**
     * dispatch route
     */
    public  static  function dispatchRoute(){

    }
}