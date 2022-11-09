<?php

/**
 * extension_loaded — 检查一个扩展是否已经加载
 */

var_dump(extension_loaded("gd"));
var_dump(dl("gd.so"));
if (!extension_loaded("gd")){
    if (!dl("gd.so")){
        echo "-----11111--------";
        exit();
    }
}