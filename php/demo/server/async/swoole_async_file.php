<?php
//https://wiki.swoole.com/wiki/page/184.html
//swoole_async_readfile()
//两种调用风格
//swoole_async_readfile
//Swoole\Async::readFile
//函数已经不存在了，已经启用
//请参考swoole 的协程的概念

//swoole_async_readfile(__DIR__."/test.txt", function($filename, $content) {
/*    Swoole\Async::readfile(__DIR__."/test.txt", function($filename, $content) {
    echo "filename is :{$filename} and file's content is ".$content.";".PHP_EOL;
});*/

//$db = new swoole_mysql();
$swoole_mysql = new Swoole\Coroutine\MySQL();
$swoole_mysql->connect([
    'host' => '127.0.0.1',
    'port' => 3306,
    'user' => 'root',
    'password' => 'iserver123',
    'database' => 'upmngr',
]);
$res = $swoole_mysql->query('select sleep(1)');

//swoole_async_writefile(__DIR__."/test.txt","content");
