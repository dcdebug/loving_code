<?php

//sql语句

$dsn = "mysql:host=localhost;port=3306;dbname=yaadmin;charset=utf8;";

$username = "root";
$password = "iServer123";
$table_name ="categories";
$pdo = new PDO($dsn,$username,$password);
$sql = "SELECT * FROM {$table_name} ORDER  BY 'sortInd'";


$result = $pdo->query($sql,PDO::FETCH_OBJ);


function  showCategoryTree($categories,$n){
        if(isset($categories[$n])){

            foreach($categories[$n] as $category){
                echo str_repeat('-',$n).$category->categoryName.PHP_EOL;
                showCategoryTree($categories,$category->id);

            }
        }

}
$categories =[];
echo "<pre>";
var_dump($pdo);

