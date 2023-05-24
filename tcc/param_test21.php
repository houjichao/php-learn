<?php

$str = "{\"callid\":\"7016338563037974528\",\"robot_tags\":[{\"node_name\":\"节点1\",\"tag\":[\"标签1\",\"标签2\"]},{\"node_name\":\"节点2\",\"tag\":[\"标签3\"]}]}";
$ret = json_decode($str,true);
$robotTags = $ret['robot_tags'];
foreach ($robotTags as $robotTag) {
    if (isset($robotTag['tag'])) {
        foreach ($robotTag['tag'] as $tag) {

        }
    }
}
