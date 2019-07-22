<?php
try{
    undefined_function();
}catch (Error $e){
    var_dump($e);
}

set_exception_handler(function($e){
    var_dump($e);
});
undefined_function();
