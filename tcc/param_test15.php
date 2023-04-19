<?php

$value = "tcc-token=e683e9663641f5997e7066f41b7d59f0; expires=Tue, 11 Apr 2023 18:00:00 GMT; path=\/; HttpOnly";

$cookieArr = explode(';', $value);
foreach ($cookieArr as $cookieItem) {
    $itemArr = explode('=', $cookieItem);
    if (count($itemArr) > 1) {
        setcookie(trim($itemArr[0]), $itemArr[1]);
    } else {
        setcookie(trim($itemArr[0]));
    }
}