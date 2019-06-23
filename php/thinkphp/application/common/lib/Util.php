<?php

//对于接口返回的数据的定义：
//status 0,1 ;message '' ; data ;
//当然，这个我们可以写在application 目录下common.php文件中
//但是为了符合面向对象的思想，我们单独定义了这个jileiwenjian ，用来供公共调用
namespace  app\common\lib;

class Util{
    /**
     * api的输出数据格式
     * @param $status
     * @param $message
     * @param $data
     * @param string $type
     */
    public  static  function show($status,$message='success',$data=array(),$type='json'){
        $result=[
            'status'=>$status,
            'message'=>$message,
            'data'=>$data,
        ];
        if($type == 'json'){
            echo   json_encode($result);
        }

    }

}