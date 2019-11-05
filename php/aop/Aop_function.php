<?php
class MyServices {


    public  function doAdminStuff1(){
        echo "Calling ".__FUNCTION__.PHP_EOL;
    }

    public  function doAdminStuff2(){
        echo "Calling ".__FUNCTION__.PHP_EOL;
    }
}

function adviceForDoAdmin1(){
    echo "AOP[1] Run".PHP_EOL;
}

function adviceForDoAdmin2(){
    echo "AOP[2] Run".PHP_EOL;
}

aop_add_after("MyServices->doAdmin*()","adviceForDoAdmin1");
aop_add_after("MyServices->doAdmin*()","adviceForDoAdmin2");
$o = new MyServices();
$o->doAdminStuff1();
$o->doAdminStuff2();



