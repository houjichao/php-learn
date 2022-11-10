<?php

/**
 * eregi()函数在由模式指定的字符串中搜索指定的字符串，搜索不区分大小写。在检查字符串(如密码)的有效性时，eregi()可能特别有用。
 * 可选的输入参数regs包含由正则表达式中的括号组成的所有匹配表达式的数组。
 * 参数
 *
 * 如果模式被验证，则返回true，否则返回false。
 * //更多请阅读：https://www.yiibai.com/php/php_eregi.html
 */

#7已经被移除了，使用preg_match

$password = "abc";

/*if (!eregi("[[:alnum:]]{8,10}", $password)) {
    print "Invalid password! Passwords must be from 8 - 10 chars";
} else {
    print "Valid password";
}*/
//更多请阅读：https://www.yiibai.com/php/php_eregi.html

