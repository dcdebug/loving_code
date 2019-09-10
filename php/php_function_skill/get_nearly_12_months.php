<?php
for ($i = 0; $i <= 11; $i++) {
    if (((date("m") - $i) % 12) <= 0) {
		$month = (12 + (date("m") - $i));
	    	$month = str_pad($month,2,'0',STR_PAD_LEFT);
		$year  = (date("Y")-1);
		echo $year."-".$month.PHP_EOL;

		//    echo (date("Y") - 1) . "-" . (12 + (date("m") - $i)) . PHP_EOL;
    } else {
	    	$month = ((date("m") - $i) % 12);
		$month = str_pad($month,2,'0',STR_PAD_LEFT);
		$year = date("Y");
		echo $year."-".$month.PHP_EOL;

        	//echo date("Y") . "-" . ((date("m") - $i) % 12) . PHP_EOL;
    }
};

function get_nearly_12_monthly(){

	        $for_current_month = date("m");
        $index = $for_current_month-12; //可能是一个负数
        if($index <=0){
            $start_year = date("Y")-1; //上一年
            $start_month = 12+($index);
        }

        for ($i = 1; $i <= 12; $i++) {
            //正序排列
            if(($start_month+$i)%12>=1){
                if(($start_month+$i)%12 ==1){
                    $start_year+=1;
                }
                $month = str_pad((($start_month+$i)%12),2,"0",STR_PAD_LEFT);
                $year = $start_year;
                //$start_month=($start_month+$i)%12;
                echo $year."-".$month.PHP_EOL;
            }else{
                $month = ($start_month+$i);
                $year=$start_year;
                echo $year."-".$month.PHP_EOL;
	    }
	}
}
get_nearly_12_monthly();

