<?php
/**
 * 类型比较
 *
 * 虽然 PHP 是弱类型语言，但也需要明白变量类型及它们的意义，因为我们经常需要对 PHP 变量进行比较，包含松散和严格比较。
 * 松散比较：使用两个等号 == 比较，只比较值，不比较类型。
 * 严格比较：用三个等号 === 比较，除了比较值，也比较类型。
 */

if (42 == "42") {
    echo '1、值相等';
}

echo PHP_EOL; // 换行符

if (42 === "42") {
    echo '2、类型相等';
} else {
    echo '3、类型不相等';
}