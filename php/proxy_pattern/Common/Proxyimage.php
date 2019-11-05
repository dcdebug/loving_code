<?php
namespace Common;
//代理模式
//代理类实现直接对实际类的操作
class Proxyimage implements  Image{


        protected  $realimage;

        protected  $filename;
        public function __construct($filename)
        {
            $this->filename = $filename;
            $this->realimage = new \Common\Realimage($filename);

        }

        //代理的操作
        public  function action(){
            if($this->realimage === null){
                $this->realimage = new Realimage($this->filename);
            }
            $this->other_action();
            //执行对象的真实的操作
            $this->realimage->display();
            $this->display();
        }
        public  function display()
        {
            //额外的操作
            echo "额外的操作".PHP_EOL;
            // TODO: Implement display() method.
        }

        public  function other_action(){
            echo __FUNCTION__.PHP_EOL;
        }
}