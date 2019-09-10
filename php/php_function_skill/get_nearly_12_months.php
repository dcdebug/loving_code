<?php 
for($i=0;$i<=11;$i++){
	if(((date("m")-$i)%12)<=0){
          echo (date("Y")-1)."-".(12+(date("m")-$i)).PHP_EOL;
	}else{

          echo date("Y")."-".((date("m")-$i)%12).PHP_EOL;
	}
	};

