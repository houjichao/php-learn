<?php


$params['date'] = date('Y-m-d');
echo $params['date'];
echo "\n";
echo date('Y-m-d',strtotime("-1 day"));