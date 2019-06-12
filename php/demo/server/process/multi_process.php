<?php
$urls =[
    'https://www.baidu.com',
    'https://sina.com.cn',
    'https://qq.com',
    'https://baidu.com?search=darrykinger',
    'https://baidu.com?search=dk',
    'https://baidu.com?search=dc'
];
$workers =[];
//传统方案：
/*foreach($urls as $url){
    $content[]=file_get_contents($url);
}*/
echo "process-start :".date("Y-m-d H:i:s").PHP_EOL;
$counts = count($urls);
for($i=0;$i<$counts;$i++){
    $process = new swoole_process(function(swoole_process $proce) use ($i,$urls){
        //执行url
        $content=getContent($urls[$i]);
        //输入到管道当中
        //echo $content.PHP_EOL;
        $proce->write($content.PHP_EOL); //与echo一样，将数据写入到管道

    },true);
    $pid = $process->start();
    $workers[$pid]=$process;
}

foreach($workers as $process){
    echo  $process->read()."\r\n";
}

echo "process-end :".date("Y-m-d H:i:s").PHP_EOL;

function getContent($url){
    sleep(1);
    return  $url." success ".PHP_EOL;
}
