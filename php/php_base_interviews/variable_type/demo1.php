<?php
//变量的
//考点：
    //PHP的字符串的定义方式以及各自的区别
    // 单引号，双信号，heredoc和newdoc
    //区别：
/**
 * 区别：
 * 单引号不能解析字符串的变量
 * 单引号不能解析转义字符，只能解析单引号和反斜线本身
 * 变量和变量，变量和字符串、字符串和字符串之间可以用.连接
 * 单引号的效率更高
 * heredoc 相当于双引号，功能相似
 * newdoc  单引号的功能。 都是用来处理大文本
 *
 * 数据类型：
 * 浮点类型的不能用于比较计算
 * 布尔类型：
 * 什么情况下会为false
 * 七种情况
 * 1.0,0.0,'','0',false,array() ,NULL
 *  数组类型：
 * 超全局数组：
 * $GLOBAL 后面的所有的内容
 * $_GET
 * $_POST
 * $_REQUEST 包含了get ,post ,cookie,并且要尽量少用，有点类似万能钥匙
 * $_SESSION
 * $_COOKIE
 * $_SERVER
 * ：SERVER_ADDR ，服务器的ip地址
 *  SERVER_NAME
 * $_FILE
 * $_ENV
 * NULL三种情况
 * 直接赋值为NULL，未定义的变量，unset的变量
 * 常量：
 * 定义：const，define
 * define 不能用于定义类的常量
 * const 可以
 * 一经定义，不能修改删除
 * 预定义常量：
 * __FILE__
 * __LINE__
 * __DIR__
 * __FUNCTION__
 * __CLASS__
 * __TRAIT__
 * __METHOD__
 * __NAMESPACE__
 *
 */
$a = 'a b c d e f $a g ';
$b = $a;
$str = "a b c d e f '{$a}' g h ";

$str1 = "a b c d e f {$a} g h ";

xdebug_debug_zval('a');
echo memory_get_usage().PHP_EOL;
//unset($b);
xdebug_debug_zval('a');
echo memory_get_usage().PHP_EOL;

die;

$str_here_doc= <<< EoT
    feshfioehwoifew
    sdfhwoiehfew
    {\$a}

    ewhoireyhwor3u24r32
    dsfhnowerhjwoierjower
EoT;

$str_new_doc = <<< 'EoT'
    shfeoiwheowrew
    shfoewwhroiew
    {$a}
    dhfwoiheirowejrow
EoT;

echo $str_new_doc.PHP_EOL;
die;

echo $str_here_doc.PHP_EOL;
die;
echo $a.PHP_EOL;

echo $str .PHP_EOL;

echo $str1.PHP_EOL;
