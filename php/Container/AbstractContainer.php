<?php
namespace  Container;


abstract  class AbstractContainer implements  ContainerInterface{

    protected $resolvedEntries = [];

    protected $definitions = [];

    public  function __construct($definitions = [])
    {
        foreach($definitions as $id =>$definition){
            $this->injection($id,$definition);
        }
    }

    public function get($id)
    {
        // TODO: Implement get() method.
        if(!$this->has($id)){
            throw new NotFoundException("No Entry or class found for {$id}");
        }
        $instance = $this->make($id);
        return $instance;
    }

    public  function has($id)
    {
        // TODO: Implement has() method.
        return isset($this->definitions[$id]);
    }

    //实际我们容器中注入的对象是多种多样的，所以我们单独抽出实例化方法。
    function make($name){

        if(!is_string($name)){
            throw new InvalidArgumentException("must is string ");
        }

        if(isset($this->resolvedEntries[$name])){
            return $this->resolvedEntries[$name];
        }
        if(!$this->has($name)){
            throw new NotFoundException("no entry or class found");
        }

        $definition = $this->definitions[$name];

        $params = [];
        if(is_array($definition)&&isset($definition['class'])){
            $params = $definition;
            $definition = $definition['class'];
            unset($params['class']);
        }
        $object = $this->reflector($definition,$params);
        return $this->resolvedEntries[$name]=$object;
    }

    //对象信息
    function reflector($concrete ,$params = array()){
        if($concrete instanceof \Closure){
            return $concrete($params);
        }elseif(is_string($concrete)){
            $reflection = new \ReflectionClass($concrete);

            $dependencies = $this->getDependencies($reflection);
            foreach($params as $index =>$value){
                $dependencies[$index]=$value;
            }
            return $reflection->newInstanceArgs($dependencies);
        }elseif(is_object($concrete)){
            return $concrete;
        }

    }

    function getDependencies($reflection){
        $dependencies = [];

        $constructor = $reflection->getConstructor();

        if($constructor !== null){
            $parameters = $constructor->getParameters();
            $dependencies = $this->getParameterByDependencies($parameters);
        }
        return $dependencies;

    }

    function getParameterByDependencies(array $dependencies){
        $parameters = [];
        foreach($dependencies as $param){
            if($param ->getClass()){
                $paramName = $param->getClass()->name;
                $paramObject = $this->reflector($paramName);
                $parameters[] = $paramObject;
            }elseif($param->isArray()){
                if($param->isDefaultValueAvailable()){
                    $parameters[] = $param->getDefaultValue();

                }else{
                    $parameters [] = [];
                }
            }elseif($param->isCallable()){
                    if($param->isDefaultValueAvailable()){
                        $parameters[] = $param->getDefaultValue();
                    }else{
                        $parameters[] = function($arg){};
                    }
            }else{
                if($param->isDefaultValueAvailable()){
                    $parameters[] = $param->getDefaultValue();
                }else{
                    if($param->allowNull()){
                        $parameters[]= null;
                    }else{
                        $parameters[] =false;
                    }
                }
            }
        }
    }
    function injection($id,$concrete){
        if(is_array($concrete)&&!isset($concrete['class'])){
            throw new ContainerException('数组必须包含类定义');
        }
        $this->definitions[$id]=$concrete;
    }
}