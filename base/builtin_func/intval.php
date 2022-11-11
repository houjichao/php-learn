<?php

/**
 * intval() 函数用于获取变量的整数值。
 *
 * intval() 函数通过使用指定的进制 base 转换（默认是十进制），返回变量 var 的 integer 数值。 intval() 不能用于 object，否则会产生 E_NOTICE 错误并返回 1。
 *
 * PHP 4, PHP 5, PHP 7
 *
 * 语法
 * int intval ( mixed $var [, int $base = 10 ] )
 * 参数说明：
 *
 * $var：要转换成 integer 的数量值。
 * $base：转化所使用的进制。
 * 如果 base 是 0，通过检测 var 的格式来决定使用的进制：
 *
 * 如果字符串包括了 "0x" (或 "0X") 的前缀，使用 16 进制 (hex)；否则，
 * 如果字符串以 "0" 开始，使用 8 进制(octal)；否则，
 * 将使用 10 进制 (decimal)。
 * 返回值
 * 成功时返回 var 的 integer 值，失败时返回 0。 空的 array 返回 0，非空的 array 返回 1。
 *
 * 最大的值取决于操作系统。 32 位系统最大带符号的 integer 范围是 -2147483648 到 2147483647。举例，在这样的系统上， intval('1000000000000') 会返回 2147483647。64 位系统上，最大带符号的 integer 值是 9223372036854775807。
 *
 * 字符串有可能返回 0，虽然取决于字符串最左侧的字符。
 */

echo intval(42) . "\n";                      // 42
echo intval(4.2) . "\n";                     // 4
echo intval('42') . "\n";                    // 42
echo intval('+42') . "\n";                   // 42
echo intval('-42') . "\n";                   // -42
echo intval(042) . "\n";                     // 34
echo intval('042') . "\n";                   // 42
echo intval(1e10) . "\n";                    // 1410065408
echo intval('1e10') . "\n";                  // 1
echo intval(0x1A) . "\n";                    // 26
echo intval(42000000) . "\n";                // 42000000
echo intval(420000000000000000000) . "\n";   // 0
echo intval('420000000000000000000') . "\n"; // 2147483647
echo intval(42, 8) . "\n";                   // 42
echo intval('42', 8) . "\n";                 // 34
echo intval(array()) . "\n";                 // 0
echo intval(array('foo', 'bar')) . "\n";     // 1

echo strval(2222) . "\n";

echo floatval(2222) . "\n";