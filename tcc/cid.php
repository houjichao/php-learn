<?php

$hasNoFollowerLeadCidMap = [];
$hasNoFollowerLeadCidMap['111'][] = 'jack';
$hasNoFollowerLeadCidMap['111'][] = 'jack1';
$hasNoFollowerLeadCidMap['222'][] = 'pony';
$hasNoFollowerLeadCidMap['222'][] = 'pony1';
//print_r($hasNoFollowerLeadCidMap);

$hasNoFollowerCids = array_filter(array_unique(array_keys($hasNoFollowerLeadCidMap)));
print_r($hasNoFollowerCids);
//print_r($hasNoFollowerLeadCidMap['111']);

unset($hasNoFollowerLeadCidMap['222']);
print_r($hasNoFollowerLeadCidMap);
print_r($hasNoFollowerLeadCidMap['111']);
