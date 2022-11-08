<?php

/**
 * 定义和用法
 * round() 函数对浮点数进行四舍五入。
 *
 * 提示：如需向上舍入为最接近的整数，请查看 ceil() 函数。
 *
 * 提示：如需向下舍入为最接近的整数，请查看 floor() 函数。
 *
 * 语法
 * round(number,precision,mode);
 *
 * 参数    描述
 * number    必需。规定要舍入的值。
 * precision    可选。规定小数点后的尾数。默认是 0，也可以为负数。
 * mode    可选。规定表示舍入模式的常量：
 * PHP_ROUND_HALF_UP - 默认。遇到 .5 的情况时向上舍入 number 到 precision 小数位。舍入 1.5 到 2，舍入 -1.5 到 -2。
 * PHP_ROUND_HALF_DOWN - 遇到 .5 的情况时向下舍入 number 到 precision 小数位。舍入 1.5 到 1，舍入 -1.5 到 -1。
 * PHP_ROUND_HALF_EVEN - 遇到 .5 的情况时取下一个偶数值舍入 number 到 precision 小数位。
 * PHP_ROUND_HALF_ODD - 遇到 .5 的情况时取下一个奇数值舍入 number 到 precision 小数位。
 */
echo round(microtime(true));
echo "\n";
echo round(microtime(true),3);
