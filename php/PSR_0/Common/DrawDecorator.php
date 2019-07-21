<?php
namespace  Common;

interface DrawDecorator{

    public  function beforeDraw();
    public  function afterDraw();
}
//画布需要调用这个装饰器接口
