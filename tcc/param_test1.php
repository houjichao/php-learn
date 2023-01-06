<?php
$filters = array();

$params['customerType'] = 111;
$params['customerType1'] = 222;

if (isset($params['customerType'])) {
    $filters[] = [
        'Field' => 'customer_type',
        'Op' => '=',
        'Value' => strval($params['customerType']),
    ];
}

if (isset($params['customerType1'])) {
    $filters[] = [
        'Field' => 'customer_type1',
        'Op' => '=',
        'Value' => strval($params['customerType1']),
    ];
}

print_r($filters) ;


$params['date'] = date('Y-m-d',strtotime("-1 day"));
$date = new DateTimeImmutable($params['date']);
print_r($date->format('Y-m-d 23:59:59')) ;
