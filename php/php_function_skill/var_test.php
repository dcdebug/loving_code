<?php 


	$data['a']= 9;
	print_r($data);
	function var_test(&$data){
		$data['b']= 9;
	}
	var_test($data);
	print_r($data);
