<?php

/**
 * for循环学习
 */

echo "<br>";
echo "------------以下是普通for循环------------------";
echo "<br>";

for ($i = 0; $i < 10; $i++) {
    echo "数字是：" . $i;
    echo "<br>";

}

echo "<br>";
echo "------------以下是foreach循环------------------";
echo "<br>";
$x = array("jack", "pony", "jane");
foreach ($x as $value) {
    //    echo "数组值是：" . $i;这里$i是可以取到值的，说明作用域和java中不同
    echo "数组值是：" . $value;
    echo "<br>";
}

foreach ($x as $key => $value) {
    //    echo "数组值是：" . $i;这里$i是可以取到值的，说明作用域和java中不同
    echo "key为：" . $key . "  value为: " . $value;
    echo "<br>";
}
