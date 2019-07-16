<?php

namespace Common;


//这是一个接口,实现了一个数据库的适配模式

interface IDatabase{
    function connect($host,$user,$password,$dbname); //数据库链接
    function query($sql); //数据库查询
    function close(); //数据库关闭
}