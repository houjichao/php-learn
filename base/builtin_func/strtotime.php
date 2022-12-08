<?php

/**
 * 定义和用法
 * strtotime() 函数将任何字符串的日期时间描述解析为 Unix 时间戳（自 January 1 1970 00:00:00 GMT 起的秒数）。
 *
 * 注意：如果年份表示使用两位数格式，则值 0-69 会映射为 2000-2069，值 70-100 会映射为 1970-2000。
 *
 * 注意：请注意 m/d/y 或 d-m-y 格式的日期，如果分隔符是斜线（/），则使用美洲的 m/d/y 格式。如果分隔符是横杠（-）或者点（.），则使用欧洲的 d-m-y 格式。为了避免潜在的错误，您应该尽可能使用 YYYY-MM-DD 格式或者使用 date_create_from_format() 函数。
 *
 * 语法
 * int strtotime ( string $time [, int $now = time() ] )
 * 参数    描述
 * time    必需。规定日期/时间字符串。
 * now    可选。规定用来计算返回值的时间戳。如果省略该参数，则使用当前时间。
 * 技术细节
 * 返回值：    成功则返回时间戳，失败则返回 FALSE。
 */

// 设置时区
date_default_timezone_set("PRC");

//将给定的一个时间增加180天
$periodTime = strtotime("+180 day",strtotime("2022-11-25 00:00:00"));
echo $periodTime;
echo "\n";
echo date('Y-m-d H:i:s', $periodTime);

$time = strtotime("2018-01-18 08:08:08");  // 将指定日期转成时间戳
// 打印当前时间  PHP_EOL 换行符，兼容不同系统
echo $time, PHP_EOL;

// 更多实例
$leadPeriod = "15";
$str = '+' . (string)$leadPeriod . ' minutes';
echo strtotime("+15 minutes"), PHP_EOL;
echo date('Y-m-d H:i:s', strtotime($str));

echo strtotime("now"), PHP_EOL;
echo strtotime("10 September 2000"), PHP_EOL;
echo strtotime("+1 day"), PHP_EOL;
echo strtotime("+1 week"), PHP_EOL;
echo strtotime("+1 week 2 days 4 hours 2 seconds"), PHP_EOL;
echo strtotime("next Thursday"), PHP_EOL;
echo strtotime("last Monday"), PHP_EOL;