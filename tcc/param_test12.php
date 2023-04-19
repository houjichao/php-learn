<?php


$ruleParams = json_decode("{\"exeAction\": \"claimLead\", \"matchRule\": \"AND\", \"recoverType\": 2, \"executeAction\": 0, \"matchConditionList\": [{\"matchKey\": \"lead.sourceTagIds\", \"matchType\": \"equal\", \"matchValue\": \"256,257\"}, {\"matchKey\": \"lead.batchId\", \"matchType\": \"equal\", \"matchValue\": \"1130\"}, {\"matchKey\": \"lead.leadTags\", \"matchType\": \"in\", \"matchValue\": \"Lexiang≤500,Lexiang＞500\"}]}", true);

foreach ($ruleParams['matchConditionList'] as $matchCondition) {
    echo $matchCondition['matchKey'], $matchCondition['matchValue'], $matchCondition['matchType'];
}

echo "=======\n";

$matchValue = "Lexiang≤500,Lexiang＞500";
$returnMatchValue = explode(',', $matchValue);
var_dump($returnMatchValue);
echo json_encode($returnMatchValue,JSON_UNESCAPED_UNICODE) ."\n";

echo "-=-=---------------\n";

$anotherCids[] = "1212121";
$anotherCids[] = "55555555";
var_dump($anotherCids);

