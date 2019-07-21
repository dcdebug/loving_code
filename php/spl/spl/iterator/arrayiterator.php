<?php

//使用迭代器循环遍历数组
$fruites =[
    'apple'=>"apple.com",
    'orange'=>'orange',
    'grape'=>'grape',
    'plum'=>'plum plum',
    'goole'=>'google.com'
];

print_r($fruites);


echo "*************use fruits *********".PHP_EOL;

foreach($fruites as $key=>$value){

    echo $key." : ".$value." ; ".PHP_EOL;
}
//使用arrayIterator
$it = new ArrayIterator($fruites);


//$it = $obj->getIterator();


echo "*************use fruits with  foreach*********".PHP_EOL;
foreach($it as $key=>$value){
    echo $key." : ".$value." ; ".PHP_EOL;
    break;
    
}

echo "*************use  while fruits with while *********".PHP_EOL;
//$it->rewind();

while($it->valid()){
    echo $it->key()." : ".$it->current()." ; ".PHP_EOL;
    $it->next();

}

//跳过某些元素进行打印
echo "************* 跳过某些元素进行打印  *********".PHP_EOL;
$it->rewind();

if($it->valid()){
    $it->seek(1); //跳过第一个元素
    while($it->valid()){
        echo $it->key()." : ".$it->current()." ; ".PHP_EOL;
        $it->next();
    }
}

echo "****************使用ksort排序****************".PHP_EOL;

$it->ksort();
foreach($it as $key=>$value){
    echo $key." : ".$value." ; ".PHP_EOL;
}

echo "****************使用asort排序****************".PHP_EOL;

$it->asort();
foreach($it as $key=>$value){
    echo $key." : ".$value." ; ".PHP_EOL;
}

