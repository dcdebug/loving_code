<?php

//切面编程思想

define("BASEDIR",__DIR__);


include BASEDIR.DIRECTORY_SEPARATOR."Common".DIRECTORY_SEPARATOR."Loader.php";

spl_autoload_register("\Common\Loader::autoloader");
