<?php

$json = "{\"GetIndicatorCustomerList\":{\"interfaceName\":\"tcc.workbench.getIndicatorCustomerList\",\"interfaceNameCh\":\"获取指标客户列表\",\"newServicePercent\":\"50\"},\"GetRainbowTest\":{\"interfaceName\":\"tcc.rule.getRainbowTest\",\"interfaceNameCh\":\"七彩石设置配置\",\"newServicePercent\":\"50\"}}";
$content = json_decode($json, TRUE);

//var_dump(array_key_exists("GetIndicatorCustomerList111",$content));

var_dump(100 - $content['GetIndicatorCustomerList']['newServicePercent']);;