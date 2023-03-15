<?php

$contactInfo = [];
if (empty($contactInfo['phone'])) {
    echo "aljdslajdla";
}

echo "------\n";
$response = json_decode("{\"Response\":{\"List\":null,\"RequestId\":\"7c756c79-0d9b-49e5-9eed-6bf787005fc2\"}}",true);
var_dump(isset($response['List']));
if (isset($response['List'])
    && !is_array($response['List'])
){
    echo "aljdslajdla";

}

if (empty($response['List'])) {
    echo "aklsjdklasjdklas";
}

