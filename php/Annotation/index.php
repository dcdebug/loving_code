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

    /**
     * @update
     * @author
     */
    public  function update(){

    }

    /**
     * @edit
     * @author
     */
    public  function edit(){

    }
}
//获取类的注释
$test_reflection = new ReflectionClass("TestController");
$doc_comment = $test_reflection->getDocComment();

$functions = $test_reflection->getMethods();
var_dump($test_reflection);

var_dump($doc_comment);

var_dump($functions);

foreach ($functions as $key=>$function){
    var_dump($function->getDocComment());
}
