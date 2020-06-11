<?php

function my_assert_handler($file, $line, $code, $desc)
{
    echo "Assertion Failed:
    File '{$file}'
    Line '{$line}'
    Code '{$code}'
    Desc '{$desc}'
";
}

// 设置回调函数
assert_options(ASSERT_CALLBACK, 'my_assert_handler');

// 让一则断言失败
assert("is_string('a');", '1 不可能等于 2');
