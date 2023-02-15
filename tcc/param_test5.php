<?php

$sql = "ashjkldlashjdklashdklashalkdhsklashjdklashdkloah";
$printSql = mb_substr($sql, 0, 10);
echo $sql;
echo "-------\n";
echo $printSql;

echo "-----\n";

$salesList = ['LiuAnLe', 'LuYin'];
foreach ($salesList as $salesName) {
    echo $salesName . "\n";
}

echo "-------\n";
$underlingList[] = 'LuYin';
$params['filter']['follower'] = ['LuYin'];
print_r(array_intersect($underlingList, $params['filter']['follower']));
