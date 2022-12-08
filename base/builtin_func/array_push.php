<?php

require "../../tcc/template_util.php";


$notAssignLeadList = [];
$notAssignLeadList[] = "123123";
$notAssignLeadList[] = "1sdklfjkl";
$notAssignLeadList[] = "12328109kxnksdf";
$leadSum = 10;
$notAssignLeadSum = 3;
$data = [
    "data" => "result",

  "msg" => "12211233",
];
$extraData = ["msg" => sprintf("本次派发线索共%s条，未成功%s条，未成功派发线索id集合:{%s}", $leadSum, $notAssignLeadSum, json_encode($notAssignLeadList))];

print_r(array_merge($data,$extraData));
$values = [];
$values[] = $extraData['msg'];
$msg = TemplateUtil::parseTemplate("111", $values);
echo "$msg";

print_r("--------\n");
$d = new DateTimeImmutable();
print_r($d);
