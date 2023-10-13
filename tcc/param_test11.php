<?php

include "crypto_util.php";

//print_r(CryptoUtil::decrypt("AQE="));

echo "-------\n";
print_r(chr('0'));
print_r(CryptoUtil::getAllEncrypt("17084464110"));


print_r(CryptoUtil::decrypt("AQOdX5n/13dFyrlcFceTv1mQ"));
echo "-------\n";

print_r(CryptoUtil::decrypt("AQM=") . "adskljdkalsjd");
echo "-------\n";
print_r(CryptoUtil::encrypt(""));
