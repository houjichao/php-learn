<?php

/**
 * array_values() 函数返回包含数组中所有的值的数组。
 *
 * 提示：被返回的数组将使用数值键，从 0 开始且以 1 递增。
 *
 * 语法
 * array_values(array)
 */

$a = array("Volvo" => "XC90", "BMW" => "X5", "Toyota" => "Highlander");

$b = array_values($a);
foreach ($b as $item => $value) {
    echo "item is:" . $item . "value is:" . $value;
}
print_r(array_values($a));