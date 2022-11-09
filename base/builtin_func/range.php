<?php

/**
 * range() 函数创建一个包含指定范围的元素的数组。
 *
 * 该函数返回一个包含从 low 到 high 之间的元素的数组。
 *
 * 注释：如果 low 参数大于 high 参数，则创建的数组将是从 high 到 low。
 *
 * 语法
 * range(low,high,step)
 *
 * 参数    描述
 * low    必需。规定数组元素的最小值。
 * high    必需。规定数组元素的最大值。
 * step    可选。规定元素之间的步进制。默认是 1。
 * 技术细节
 * 返回值：    返回一个包含从 low 到 high 的元素的数组。
 */

$nums = range(0, 10);
print_r($nums);

$nums1 = range(50, 100, 3);
print_r($nums1);