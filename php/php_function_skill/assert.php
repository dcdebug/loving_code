<?php


assert_options(ASSERT_ACTIVE ,1); //激活PHP断言

assert_options(ASSERT_WARNING,0);

assert_options(ASSERT_BAIL,1);

assert_options(ASSERT_CALLBACK,'dcb_callback');


function dcb_callback($script, $line, $message) {
    echo "<h1>Condition failed!</h1><br />
        Script: <strong>$script</strong><br />
        Line: <strong>$line</strong><br />
        Condition: <br /><pre>$message</pre>";
}

// Parameters

$a = 5;

$b = "simple dcb with php";

// pre-condition

assert('is_integer($a)&&($a>0)&&($a<20)&&is_string($b)&&(strlen($b)>5);');


// function

function combine($a,$b){
    return "Kombined :".$b.$a;
}
$result = combine($a,$b);


// post-condition

assert('is_string($result)&&(strlen($result)>0);');

// all right ,the function works fine

var_dump($result);
