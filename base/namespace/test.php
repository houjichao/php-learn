<?php

namespace pfinal;

use pfinal\sub;

include 'helper.php';
function sum()
{
    return 'pfinal sum';
}

# 使用当前命名空间中的sum
echo sum() . "\n";
# 使用 helper.php 中的sum
echo sub\sum() . "\n";