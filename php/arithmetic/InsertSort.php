<?php


class InsertSort {

    protected  $arr;
    // 插入排序算法
    public  function __construct($arr )
    {
        $this->arr = $arr;
    }

    public  function insertSort(){
        echo "origin:".PHP_EOL;
        foreach($this->arr as $key=>$item){
            echo "key :".$key." => ".$item.PHP_EOL;
        }
        $length = count($this->arr);

        $i = 0;
        //$i=0的元素是已经排序好的元素
        for($i=1;$i<$length;$i++){
            $tmp = $this->arr[$i];
            //拿排序好的列表与$i=1比较，找到比较合适的位置，将$i放到已经排序好的列表中的合适的位置
            for($j = $i-1;$j>=0&&$j<$length;$j--){
                    if($this->arr[$j]>$tmp){
                        $this->arr[$j+1] = $this->arr[$j];
                        $this->arr[$j]=$tmp;
                    }

            }
        }


        echo "sorted arr".PHP_EOL;
        foreach ($this->arr as $k=>$item){
            echo "key :".$key." => ".$item.PHP_EOL;
        }
    }
}

$arr = [83, 2, 44, 21, 2, 23, 3, 322, 1111,1.5,1.0,1.001];
$insertSort = new InsertSort($arr);
$insertSort->insertSort();

