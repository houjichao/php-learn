<?php

/*$assignSales = explode(';',"7ed27977e7a5459edfcb6a170d813b7f;BangBangTang;arqiuBuShiAJiu");
var_dump($assignSales);

$assignSales = ['jacktest'];
var_dump($assignSales);*/


if (empty($assignSales)) {
    $assignManagers = explode(';', "7ed27977e7a5459edfcb6a170d813b7f;BangBangTang;arqiuBuShiAJiu");
    $assignSales = [$assignManagers[0]];
}
var_dump($assignSales);