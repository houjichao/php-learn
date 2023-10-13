<?php


$params['encrypt'] = "<xml><AppId><![CDATA[202039493]]></AppId><Encrypt><![CDATA[GaEwYXVcv2nul+ys6X2llcTrltVbUwEv8oEUB5cA80yCeCYP6cxuGCpjpJoBQMkLeJKL4SWqiqxgIjUHa3zkmUFQhI4gLqU8cfCWxnMJbBEmOwVjLimmnFNobacB3jA96tDzqLHH8Yxtb0bCsG8sh3uYJ2h6vW84o\/DXv8hFyAsurYxSAwECV5AS92Fr1iNpwz1LCIGJkf9W0O7+VBX6J4ipd+wkUGajzg4BUgst+CHH3g6hRHYlxf2jenZbQIETbHoOfj4qEkUym81lHb0ONTvoNemsegFNrwJViWqAiIzq++wgGSCwMhZ6hGoW6bZVuGyi7TOeqexeLvd5wSxeKgcqLVrlgiN6ZBIiuaTjfwfJw8txFSMjjmuuz\/zFEt8bQje\/swhk0jA++ggZNx77jjO77qObY2daUlycoGbP9dToEi65utL9UhLcQt4RC\/G5KEdENdcx0I+5X0XEnPLgGzCn59mfvdcw8TKjiIjscv6GJ9+zF6Ee3KqwpJonxIGzWmQLnQt75U6O+gjeZHC1rnZuTX+aRJ74zo3R3k4\/Pn7vWq3oeF1l837tyltEMVMCu7ZbUlU4oFCjqJ53Nj6oH2xEBQMEfcdqmDMBsm2uBuSpZtyOdRry2gxcDnwzZ4fOoLWW+8VtzHUqxQHukbzkZaF0+GIa1axWHoa5PB\/QqR\/DVZO2H4+l5uhdqyV1c8u8hlO77ZC\/svUymSvagSK7vwPA8uqZjELakFHfgsYflau4bsqVHGQxoPuLL9ut5cbbSOvQ6gtkua4AnrWGbv5FsRJsTOY00fXTkFU+ghvK6trv+A6zrc\/Si1\/TamLcEylppK1EC\/+QvEKSAd4ZfxP31rMsQF4dsXJKsSSl5oQaXNi0Mqx3Tghcy0bBHsSZ8\/o\/yQ92ozMwG0nLRZy2wLIYRgN7BYain7Y5vbEc\/v37hdkcWpJDbaf8pwkIVqjLYSzv8nQes+mj5qfriF3n7Jodf8IKK1yB\/0g7JJsBagtRZWrfsgQ8sQhQhBrQBxYdoaggVvr5fDKmvJCMfoYJ9oKfHqscxf6N3FKtmlqHECbJHeb8zTT1MPy5h22gEakYNMvzD5HV+dcabuVyROggSpffkmAQ4qGhT4e\/migO6PdEhQoVFbqVc5Ty3Zq74SWaVVfDKOHXmsh5Vu4gxV0Zxou\/kh+29pUtGmdTjC65XMoZ+Dv+gw2woaNABv5sDEpidny7a\/gRsmn8QjmjopaQEvkdP\/00jRXw9YXUXIUiyoMEbe60D\/TBxTe9DMluTYuFn+BBzZer\/ikJlpOB7lQSPvlInCiU27cxRbVdUwb14B6bInc=]]></Encrypt></xml>";

$xml_tree = new DOMDocument();
$xml_tree->loadXML($params['encrypt']);
$array_e_encrypt = $xml_tree->getElementsByTagName('Encrypt');
$encrypt = $array_e_encrypt->item(0)->nodeValue;
print_r($encrypt."\n");
//获取企业appId
$array_e_appId = $xml_tree->getElementsByTagName('AppId');
print_r($array_e_appId);
$appId = $array_e_appId->item(0)->nodeValue;

print_r($appId);