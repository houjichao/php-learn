<?php

$t=date("H");
echo $t;
echo "<br>";
if ($t<"10")
{
    echo "Have a good morning!";
}
elseif ($t<"20")
{
    echo "Have a good day!";
}
else
{
    echo "Have a good night!";
}

echo "--------------\n";

if ('2' == '02') {
    echo 'true';
} else {
    echo 'false';
}