<?php

/**
 * mt_rand() 函数使用 Mersenne Twister 算法生成随机整数。
 * 提示：该函数是产生随机值的更好选择，返回结果的速度是 rand() 函数的 4 倍。
 * 提示：如果您想要一个介于 10 和 100 之间（包括 10 和 100）的随机整数，请使用 mt_rand (10,100)。
 *
 * 语法
 * mt_rand();
 * or
 * mt_rand(min,max);
 * 参数    描述
 * min    可选。规定返回的最小数。默认是 0。
 * max    可选。规定返回的最大数。默认是 mt_getrandmax()。
 * 技术细节
 * 返回值：    介于 min（或 0）与 max（或 mt_getrandmax()）之间（包括边界值）的随机整数。如果 max < min 则返回 FALSE。
 */

#echo(mt_rand() . "\n");
echo(mt_rand() . "\n");
echo(mt_rand(0, 4));

if (1) {
    echo "asdjalskdjla";
}
if (0){
    echo "1238012830128903";
}