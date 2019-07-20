<?php
namespace  Common;

abstract  class EventGenerator{

    //事件产生类

    private  $observer_array = [];//保存观察者的数组,EventGenerator 类只知道有观察者,并不需要知道
    //哪些观察者


    //增加观察者对象
    function addObject(Observer $observer){
            $this->observer_array[]  = $observer;
    }
    //对象通知

    function notify(){
        //通知所有的观察者
        foreach($this->observer_array as $key => $observer){
            //观察者进行处理
            $observer ->update();


        }
    }

}