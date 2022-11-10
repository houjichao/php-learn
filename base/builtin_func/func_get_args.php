<?php

/**
 * php中的的函数参数可以不固定，甚至不用定义参数，在函数内部使用func_get_args()函数获得参数列表，调用时可以为函数指定任意参数，非常方便
 */

function addAnyThing()
{
    $total = 0;
    $args = func_get_args();
    foreach ($args as $key => $value) {
        $total += $value;
    }
    return $total;

}

echo addAnyThing(1, 3, 5, 7, 9);