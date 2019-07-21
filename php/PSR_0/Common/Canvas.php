<?php
namespace Common;

class Canvas implements DrawDecorator
{
    public $data;

    //保存装饰器
    protected  $decorator_arr = [];
    public  function addDecorator(DrawDecorator $decorator){
        $this->decorator_arr[]= $decorator;
    }
    //实现接口的方法
    public  function beforeDraw(){

        //执行装饰器中的方法,只要继承了装饰器接口,都要实现这个接口,aterDraw同
        foreach($this->decorator_arr as $decorator){
            $decorator->beforeDraw();
        }
    }
    public  function afterDraw(){
        foreach($this->decorator_arr as $decorator){
            $decorator->afterDraw();
        }

    }
    //Decorator
    function init($width = 20, $height = 10)
    {
        $data = array();
        for($i = 0; $i < $height; $i++)
        {
            for($j = 0; $j < $width; $j++)
            {
                $data[$i][$j] = '*';
            }
        }
        $this->data = $data;
    }

    function draw()
    {
        //此处要调用当前的before装饰器
        $this->beforeDraw();
        foreach($this->data as $line)
        {
            foreach($line as $char)
            {
                echo $char;
            }
            echo "<br />\n";
        }
        $this->afterDraw();
    }

    function rect($a1, $a2, $b1, $b2)
    {
        foreach($this->data as $k1 => $line)
        {
            if ($k1 < $a1 or $k1 > $a2) continue;
            foreach($line as $k2 => $char)
            {
                if ($k2 < $b1 or $k2 > $b2) continue;
                $this->data[$k1][$k2] = '&nbsp;';
            }
        }
    }
}

