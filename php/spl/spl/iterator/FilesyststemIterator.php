<?php

date_default_timezone_set("PRC");

$it = new FilesystemIterator(".") ; //某个目录的迭代器

foreach( $it as $key =>$finfo){

    //format
    printf("%s\t%s\t%8s\t%s\n",
        date("Y-m-d H:i:s",$finfo->getMTime()),
        $finfo->isDIr()?"d":"-",
            number_format($finfo->getSize()),
            $finfo->getFileName()

        );
}
