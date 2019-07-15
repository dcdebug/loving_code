<?php

namespace Common;

class Objects
{

    protected  $array=[];

    static function test()
    {
        echo __NAMESPACE__.__FUNCTION__.PHP_EOL;
    }

    function __set($key,$value){

        var_dump(__FUNCTION__);

        $this->array[$key]=$value;
    }


    function __get($key){
        var_dump(__FUNCTION__);

        return $this->array[$key];

    }

    function __call($func,$param){

        var_dump($func,$param);
        var_dump(__FUNCTION__);
    }

    static function __callStatic($name, $arguments)
    {
        // TODO: Implement __callStatic() method.
        var_dump($name);

        var_dump($arguments);


    }

    function __toString()
    {
        // TODO: Implement __toString() method.
        var_dump(__METHOD__);

        return __CLASS__.PHP_EOL;

    }
    //将一个对象作为一个函数去访问

    function __invoke($params)
    {
        // TODO: Implement __invoke() method.
        var_dump(__METHOD__);
        var_dump($params);

    }
}
//不能有echo之类的代码
