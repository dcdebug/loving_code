<?php
//创建内存表
$table  = new swoole_table(1024); //表的行数
//内存表中增加一列

$table->column("id",$table::TYPE_INT,4);
$table->column("name",$table::TYPE_STRING,64);
$table->column("age",$table::TYPE_INT,3);
$result=$table->create();
var_dump($result);

//设置一个 key,插入内容，key对应的内容
$table->set("darry_kinger",['id'=>1,'name'=>'darrrykinger','age'=>30]);
//查看table的值是否存在
//设置table的第二种方式：
$table['da']=[
    'id'=>2,
    'name'=>'darrykinger',
    'age'=>31,
];
//可以这样获取：

print_r($table['da']);
//加某个值
$table->incr("da",'age',100);
print_r($table['da']);
//原子自减操作
$table->decr("da",'age',33);
print_r($table['da']);
//删除操作
$table->del("da");

print_r($table['da']);
$result= $table->get("darry_kinger");
print_r($result);
//执行完，数据会被释放
