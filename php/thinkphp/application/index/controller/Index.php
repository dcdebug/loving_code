<?php
namespace app\index\controller;

//引入common类库
use app\common\lib\ali\Sms;
class Index
{
    public function index()
    {
        return 'swoole index '.PHP_EOL;
        //return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5.1<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
    }
    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
    function swoole_hello(){
        echo "swoole_hello".PHP_EOL;
    }

    function sms(){
        return 'sms';
            try{
                //Sms::sendSms();
            }catch (\Exception $e){
                echo $e->getMessage();
            }
    }
}
