<?php
class DB{


	public function __construct(){
		$dsn="mysql:dbname=upmngr;host=127.0.0.1";

		$user = "root";

		$password = "iServer123";

		//start connect 
		try{
			$pdo = new  PDO($dsn,$user,$password,array(
			    PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"
            ));
			print_r($pdo);
		}catch(\Exception $e){
			echo "connectede failed: ".$e->getMessage();
		}
	}

}
new DB();
