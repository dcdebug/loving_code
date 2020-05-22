<?php

date_default_timezone_set("Asia/Shanghai");
$endDate = date("Y-m-d",time());
echo $endDate.PHP_EOL;
echo strtotime($endDate).PHP_EOL;
echo date('Y-m-d H:i:s',strtotime($endDate)).PHP_EOL;
$endDate = "2020-03-31";

$beginDate = date("Y-m-d H:i:s",strtotime("-1 month",strtotime($endDate)));
echo $beginDate.PHP_EOL;
$begin_limit = date("Y-m-d H:i:s",strtotime("-1 year",strtotime($endDate)));
echo $begin_limit.PHP_EOL;
