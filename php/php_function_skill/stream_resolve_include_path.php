<?php


$result = stream_resolve_include_path("spl.php");
var_dump($result);

$result = stream_resolve_include_path("a.php");
var_dump($result);

//https://www.php.net/manual/zh/function.get-include-path.php
//等同于ini_get("include_path")

var_dump(get_include_path());
if(function_exists("stream_resolve_include_path")){
    function stream_resolve_include_path_self($filename){
        $paths = PATH_SEPARATOR == ':' ?
            preg_split('#(?<!phar):#', get_include_path()) :
            explode(PATH_SEPARATOR, get_include_path());
        foreach ($paths as $prefix) {
            $ds = substr($prefix, -1) == DIRECTORY_SEPARATOR ? '' : DIRECTORY_SEPARATOR;
            $file = $prefix . $ds . $filename;

            if (file_exists($file)) {
                return $file;
            }
        }

        return false;
    }
}


$result = stream_resolve_include_path_self("spl.php");

var_dump($result);





