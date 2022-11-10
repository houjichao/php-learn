<?php

/**
 * getenv()函数定义：取得系统的环境变量；
 * 语法：string getenv(string varname)；
 * 注：返回的是字符串；
 */

putenv("new=very new");
echo getenv("new");
echo getenv("NEW");
echo getenv("REMOTE_ADDR");