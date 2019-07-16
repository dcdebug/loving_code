<?php
namespace Common;

class Register{


    //duixiang 被注册到全局变量树上,成为其一个树枝
    protected  static  $objects;

    /**
     * 将对象放到树上,名称是alias;
     *
     * @param $alias
     * @param $object
     */
    static  function set($alias,$object){
            self::$objects[$alias]=$object;
    }

    static function get($alias){
            return  self::$objects[$alias];
    }

    static  function _unset($alias){
            unset(self::$objects[$alias]);
    }
}