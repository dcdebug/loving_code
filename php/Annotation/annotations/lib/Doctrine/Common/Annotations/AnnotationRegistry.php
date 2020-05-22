<?php
/**
 * Created by PhpStorm.
 * User: darry
 * Date: 2020-05-14
 * Time: 19:15
 */

namespace Doctrine\Common\Annotations;


final class AnnotationRegistry
{
    static  private  $autoloadNamespaces= [];

    static private  $loaders = [];

    static private  $failedToAutoLoader = [];

    /**
     * Registry Reset
     */
    public static function reset() : void{
        self::$autoloadNamespaces = [];
        self::$loaders = [];
        self::$failedToAutoLoader = [];
    }

    public static function registerFile(string $file){
        require_once $file;
    }

    public static function registerAutoloadNamespace(string $namespace,$dirs=null):void {
        self::$autoloadNamespaces[$namespace]=$dirs;
    }
    public static function registerAutoloadNamespaces(array $namespaces_arr):void{
        self::$autoloadNamespaces = \array_merge(self::$autoloadNamespaces,$namespaces_arr);
    }

    public static function registerLoader(callable  $callback):void{
        self::$failedToAutoLoader = [];
        self::$loaders [] = $callback;
    }
    public static function registerUniqueLoader(callable  $callback){
        if(!in_array($callback,self::$loaders)){
            self::registerLoader($callback);
        }
    }

    public static function loadAnnotationClass(string $class ){
        if(class_exists($class,false)){
            return true;
        }
        if(array_key_exists($class,self::$failedToAutoLoader)){
            return false;
        }

        foreach(self::$autoloadNamespaces as $namespace =>$dirs){
            if(strpos($class,$namespace) === 0){
                $file = \str_replace('\\', \DIRECTORY_SEPARATOR, $class) . '.php';
            }
            if($dirs === null){
                    if($path = stream_resolve_include_path($file)){
                        require $file;
                        return true;
                    }
            }else{
                foreach((array)$dirs as $dir){
                    if(is_file($dir.\DIRECTORY_SEPARATOR.$file)){
                        require $dir.\DIRECTORY_SEPARATOR.$file;
                        return true;
                    }
                }
            }
        }
        foreach (self::$loaders AS $loader) {
            if ($loader($class) === true) {
                return true;
            }
        }

        self::$failedToAutoload[$class] = null;

        return false;

    }
}
