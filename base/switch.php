<?php
/**
 * switch学习
 * 和java中的Switch类似，和go有区别，go中可以省略break,php中不可省略
 *
 */

$favcolor = "red";

switch ($favcolor) {
    case "red":
        echo "你喜欢的颜色是红色\n";
        break;
    case "green":
        echo "你喜欢的颜色是绿色\n";
        break;
    case "white":
        echo "你喜欢的颜色是白色\n";
        break;
    case "black":
        echo "你喜欢的颜色是黑色\n";
        break;
    default:
        echo "不知道你丫喜欢什么颜色\n";

}