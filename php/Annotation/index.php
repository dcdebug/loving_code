<?php

/**
 * Class TestController
 * @TestController()
 */
class TestController{

    /**
     * @index
     * @author
     *
     */
    public  function index(){

    }
}
//获取类的注释
$test_reflection = new ReflectionClass("TestController");
print_r($test_reflection,true);
