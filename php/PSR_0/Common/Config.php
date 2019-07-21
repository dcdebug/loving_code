<?php
namespace  Common;


//arrayAccess :使一个对象,以数组的形式访问.

class Config implements  \ArrayAccess{

    protected  $path;//配置文件路径

    protected  $configs = []; //具体的配置项

    function __construct($path)
    {
        $this->path = $path;
    }

    public  function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
    }

    public function offsetSet($offset, $value)
    {


        // TODO: Implement offsetSet() method.
    }

    public  function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }

    public  function offsetGet($offset)
    {
        if(empty($this->configs[$offset])){
            $file_path = $this->path.DIRECTORY_SEPARATOR.$offset.".php";
            $config = require $file_path;
            $this->configs[$offset] = $config;
        }

        return $this->configs[$offset];
        // TODO: Implement offsetGet() method.
    }
}