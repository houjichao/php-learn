<?php
date_default_timezone_set("PRC");

echo time();
echo "\n";
echo strtotime(getdate());
echo "\n";
echo time() -  strtotime("2022-11-24 19:21:50");