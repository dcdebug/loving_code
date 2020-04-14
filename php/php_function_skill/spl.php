<?php


$pq = new SplPriorityQueue();

$pq->insert('imi 基于 Swoole 常驻内存协程开发框架', 100);
$pq->insert('https://gitee.com/yurunsoft/IMI', 200);
$pq->insert('https://github.com/Yurunsoft/IMI', 300);
$pq->insert('https://github.com/Yurunsoft/IMI', 300);
/*
var_dump($pq->count());

$serialize = serialize($pq);

var_dump($serialize);

$unserialize = unserialize($serialize);

var_dump($unserialize);

var_dump($unserialize->count());*/


class SplPriorityQueueExt extends \SplPriorityQueue implements  \Serializable{

    public function  serialize()
    {
        var_dump($this);
        echo PHP_EOL;

        var_dump(clone $this);
        // TODO: Implement serialize() method.
        return serialize(iterator_to_array(clone $this));
    }

    public function  unserialize($serialized)
    {
        // TODO: Implement unserialize() method.
        $array = unserialize($serialized);
        foreach($array as $p=>$v){
            $this->insert($v,$p);
        }
    }

    public function  __clone(){
        echo strtolower(__FUNCTION__);

    }
}

$pqs = new SplPriorityQueueExt();

var_dump(clone $pqs);

$pqs->insert('imi 基于 Swoole 常驻内存协程开发框架', 100);
$pqs->insert('https://gitee.com/yurunsoft/IMI', 200);
$pqs->insert('https://github.com/Yurunsoft/IMI', 300);
$pqs->insert('https://github.com/Yurunsoft/IMI', 300);

//var_dump($pqs->count());

$serialize = serialize($pqs);

//var_dump($serialize);

$unserialize = unserialize($serialize);

//var_dump($unserialize);



