<?php

/**
 * 定义和用法
strncasecmp() 函数比较两个字符串（不区分大小写）。

注释：strncasecmp() 是二进制安全的，且不区分大小写。

提示：该函数与 strcasecmp() 函数类似，不同的是，strcasecmp() 没有 length 参数。

语法
strncasecmp(string1,string2,length)

参数	描述
string1	必需。规定要比较的第一个字符串。
string2	必需。规定要比较的第二个字符串。
length	必需。规定每个字符串用于比较的字符数。
技术细节
返回值：	该函数返回：
0 - 如果两个字符串相等
<0 - 如果 string1 小于 string2
>0 - 如果 string1 大于 string2
 */
$leadInfo['leadReleaseSource']  = "DIANSHI";
if (strtolower($leadInfo['leadReleaseSource']) != "dianshi") {
    echo "asdjoklasjdklasjkdklo";
}