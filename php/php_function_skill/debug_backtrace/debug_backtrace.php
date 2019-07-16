<?php

//function debug_backtrace的作用：debug_backtrace — 产生一条回溯跟踪(backtrace)


//参数：options
// DEBUG_BACKTRACE_PROVIDE_OBJECT :是否填充为obejct的索引
//DEBUG_BACKTRACE_IGNORE_ARGS 是否忽略args的索引，包括所有的 function/method 的参数，能够节省内存开销。
//参数limit ：截至 5.4.0，这个参数能够用于限制返回堆栈帧的数量。 默认为 (limit=0) ，返回所有的堆栈帧。




class debug_backtrace{
    function a_test($str){


        echo PHP_EOL.$str.PHP_EOL;
        $debug_backtrace = debug_backtrace();
        print_r($debug_backtrace);
    }

    static function test_static(){
        $debug_backtrace = debug_backtrace();
        print_r($debug_backtrace);
    }

}


$debug_backtrace = new debug_backtrace();

$debug_backtrace->a_test("friend");

$debug_backtrace::test_static();

