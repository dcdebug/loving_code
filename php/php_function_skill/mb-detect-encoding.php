<?php

if(extension_loaded("mbstring")){
    $str = 'test'; // ISO-8859-1
    $result = mb_detect_encoding($str, 'auto'); // 'UTF-8'
    var_dump($result);
    echo PHP_EOL;
    $result = mb_detect_encoding($str, 'UTF-8', true); // false
    var_dump($result);
}else{
    echo 'need mbstring'.PHP_EOL;
}

$str = "abcd";
/* 使用当前的 detect_order 来检测字符编码 */
$result = mb_detect_encoding($str);
var_dump($result);
/* "auto" 将根据 mbstring.language 来扩展 */
$result = mb_detect_encoding($str, "auto");
var_dump($result);
/* 通过逗号分隔的列表来指定编码列表 encoding_list */
$result= mb_detect_encoding($str, "JIS, eucjp-win, sjis-win");
var_dump($result);
/* 使用数组来指定编码列表 encoding_list  */
$ary[] = "ASCII";
$ary[] = "JIS";
$ary[] = "EUC-JP";
$result =  mb_detect_encoding($str, $ary);
var_dump($result);



