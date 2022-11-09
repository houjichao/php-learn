<?php

/**
 * str_repeat() 函数把字符串重复指定的次数。
 *
 * 语法
 * str_repeat(string,repeat)
 *
 * 参数    描述
 * string    必需。规定要重复的字符串。
 * repeat    必需。规定字符串将被重复的次数。必须大于等于 0。
 */

function desensitization($str, $start, $desLength)
{
    $length = mb_strlen($str);
    if ($length < 4 || ($length - $start) <= 0) {
        return $str;
    }
    if ($length - $start - $desLength >= 0) {
        $repeatLength = $desLength;
    } else {
        $repeatLength = $length - $start;
    }
    return sprintf('%s%s%s',
        mb_substr($str, 0, $start),
        str_repeat('*', $repeatLength),
        ($length - $start - $repeatLength > 0 ? mb_substr($str, -($length - $start - $repeatLength)) : '')
    );
}

echo desensitization("13811112222", 3, 4);