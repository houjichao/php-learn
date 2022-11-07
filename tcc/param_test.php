<?php

include "lead_config.php";
include "params_util.php";

//忽略 PHP提示Notice: Undefined variable
error_reporting(E_ALL & ~E_NOTICE);

class ParamTest{

    public static function string2array($x){
        if($x==NULL || $x == ""){//先做兼容处理
            return array();
        }

        return json_decode($x,True);
    }

}

$paramTest = new ParamTest();

$request = "{\"version\":1,\"componentName\":\"tcc-web\",\"eventId\":\"1667788447025.0.9141871053308941\",\"interface\":{\"interfaceName\":\"GetLeadList\",\"para\":{\"page\":1,\"pageSize\":10,\"needTotal\":0,\"status\":[0],\"leadBeginTime\":\"2022-10-07 00:00:00\",\"leadEndTime\":\"2022-11-07 23:59:59\"}}}";
$request = $paramTest::string2array($request);
//var_dump($request);
echo "----------------\n";
print_r($request);
echo "----------------\n";
$interface_name = $request['interface']['interfaceName'];
$para = isset($request['interface']['para']) ? $request['interface']['para'] : array();
echo "----------------\n";
echo $interface_name;
echo "\n----------------\n";
print_r($para);

$rule = [
    'page' => ['type' => 'int', 'is_null' => true, 'range'=> '[1,~]', 'value' => 1],
    'pageSize' => ['type' => 'int', 'is_null' => true, 'value' => 10],
    'leadId' => ['type' => 'int', 'is_null' => true],
    'customerId' => ['type' => 'int', 'is_null' => true],
    'leadName' => ['type' => 'string', 'is_null' => true],
    'name' => ['type' => 'string', 'is_null' => true],
    'ruleType' => ['type' => 'int', 'is_null' => true],
    'sourcePrimaryTagId' => ['type' => 'int', 'is_null' => true],
    'sourceSecondaryTagId' => ['type' => 'int', 'is_null' => true],
    'groupId' => ['type' => 'int', 'is_null' => true],
    'leadBeginTime' => ['type' => 'mysqlTimeStamp', 'is_null' => true],
    'leadEndTime' => ['type' => 'mysqlTimeStamp', 'is_null' => true],
    'publicTagId' => ['type' => 'int', 'is_null' => true],
    'privateTagId' => ['type' => 'int', 'is_null' => true],
    'lastFollowBeginTime' => ['type' => 'mysqlTimeStamp', 'is_null' => true],
    'lastFollowEndTime' => ['type' => 'mysqlTimeStamp', 'is_null' => true],
    'abandonBeginTime' => ['type' => 'mysqlTimeStamp', 'is_null' => true],
    'abandonEndTime' => ['type' => 'mysqlTimeStamp', 'is_null' => true],
    'phone' => ['type' => 'string', 'is_null' => true, 'need_trim' => true],
    'qq' => ['type' => 'string', 'is_null' => true, 'need_trim' => true],
    'sort' => ['type' => 'string', 'is_null' => true, 'enum' => array_keys(LeadConfig::LEAD_ORDER_BY_TRANS_MAP)],
    'sortType' => ['type' => 'string', 'is_null' => true, 'enum' => ['ASC', 'DESC']],
    'leadAssignTimeFrom' => ['type' => 'timeStamp', 'is_null' => true],
    'leadAssignTimeTo' => ['type' => 'timeStamp', 'is_null' => true],
    'extend' => ['type' => 'string', 'is_null' => true],
    'regTimeFrom' => ['type' => 'timeStamp', 'is_null' => true],
    'regTimeTo' => ['type' => 'timeStamp', 'is_null' => true],
    'authTimeFrom' => ['type' => 'timeStamp', 'is_null' => true],
    'authTimeTo' => ['type' => 'timeStamp', 'is_null' => true],
    'intentionLevel' => ['type' => 'string', 'is_null' => true],
    'intentionSecondLevel' => ['type' => 'string', 'is_null' => true],
    'smallProduct' => ['type' => 'string', 'is_null' => true],
    'subProduct' => ['type' => 'string', 'is_null' => true],
    'leadTags' => ['type' => 'array', 'is_null' => true],
    'payType' => ['type' => 'int', 'is_null' => true, 'enum' => array_keys(LeadConfig::PAY_TYPE_MAP), 'need_trim' => true],
    'firstAssignTimeFrom' => ['type' => 'timeStamp', 'is_null' => true],
    'firstAssignTimeTo' => ['type' => 'timeStamp', 'is_null' => true],
    'firstAssigner' => ['type' => 'array', 'is_null' => true],
    'firstFollowTimeFrom' => ['type' => 'timeStamp', 'is_null' => true],
    'firstFollowTimeTo' => ['type' => 'timeStamp', 'is_null' => true],
    'firstFollower' => ['type' => 'array', 'is_null' => true],
    'leadReleaseSourceId' => ['type' => 'string', 'is_null' => true],
    //增加needTotal参数，判断是否需要返回total字段,默认为true
    'needTotal' => ['type' => 'int', 'is_null' => true, 'value'=>1, "is_empty" => true],
    //查询类型，如果是更新后立即查询，则不走es
    'queryType' => ['type' => 'string', 'is_null' => true],
];
$ret = ParamsUtil::checkParams($para, $rule);
print("\n参数格式化结果\n");
print_r($ret);
echo $ret['code'];