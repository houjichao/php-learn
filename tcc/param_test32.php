<?php


function is_time_within_two_years($input_time) {
    $input_timestamp = strtotime($input_time);
    $current_timestamp = time();
    echo $input_timestamp;
    echo "\n";
    echo $current_timestamp;
    $two_years_later_timestamp = strtotime('+2 years', $current_timestamp);

    return $input_timestamp >= $current_timestamp && $input_timestamp <= $two_years_later_timestamp;
}

// 示例
$input_time = '2023-09-15 11:22:45';
$result = is_time_within_two_years($input_time);
if ($result) {
    echo "时间在当前时间到两年内的范围内";
} else {
    echo "时间不在当前时间到两年内的范围内";
}