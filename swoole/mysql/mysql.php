<?php

use function Swoole\Coroutine\run;

run(function () {
    $swoole_mysql = new Swoole\Coroutine\MySQL();
    $swoole_mysql->connect([
        'host' => '127.0.0.1',
        'port' => 3307,
        'user' => 'root',
        'password' => '123456',
        'database' => 'tcc',
        'strict_type' => true ////开启严格模式，query方法返回的数据也将转为强类型,如果不开，student表的age返回就为string
    ]);
    //$res = $swoole_mysql->query("SET optimizer_switch = 'prefer_ordering_index=on'");
    $res = $swoole_mysql->query("select * from tcc_lead");

    echo strtotime($res[0]['createTime']);
    echo "\n";

    $hasNoFollowerLeadCidMap = [];
    $hasNoFollowerLeadCidMap['111'][] = 'jack';
    $hasNoFollowerLeadCidMap['111'][] = 'jack1';

    print_r($hasNoFollowerLeadCidMap);

    $hasNoFollowerCids = array_filter(array_unique(array_keys($hasNoFollowerLeadCidMap)));
    print_r($hasNoFollowerCids);

    /*print_r("--------------hhhhhhh\n");
    print_r($res);
    print_r("--------------hhhhhhh\n");*/

    $cid = "jack";
    $retData = array_map(function ($lead) use ($cid) {
        $leadMap = [];
        if ($lead['cid'] === $cid) {
            $leadMap[$cid] = $lead;
        }
        return $leadMap;
    }, $res);
    print_r("-----\n");

    print_r(count($retData[0][$cid]));
    print_r("-----\n");

    print_r($retData);
    print_r("-----\n");
    print_r($retData[0][$cid]['name']);



    /*foreach ($hasNoFollowerCids as $cid) {
        $retData = array_map(function ($res)  use ($cid) {
            foreach ($res as $lead) {
                print_r("-------\n");
                print_r($lead);
                print_r("-------\n");
                if ($lead['cid'] === $cid) {
                    $leadMap['$cid'][] = $lead;
                    return $leadMap;
                }
            }
        }, $res);
        //var_dump($retData);
    }*/


    //var_dump($swoole_mysql->affected_rows);
    //var_dump($res);
    //var_dump(array_count_values($res["jack"]));
    //echo $res[0]['name'];
    //echo addslashes($res[0]['name']);

});