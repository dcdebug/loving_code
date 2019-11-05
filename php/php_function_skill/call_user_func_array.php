<?php
//调用回调函数,并把一个数组参数作为回调函数的参数


//第一个 参数作为回调函数的调用，回调函数中要传入的参数


function only_function($param1,$param2){
    echo __FUNCTION__." params:".print_r(func_get_args(),true);
}


only_function(1,2);