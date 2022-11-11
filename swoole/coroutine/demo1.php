<?php

\Co\run(function () {
    go(function () {
        Co::sleep(3.0);
        go(function () {
            Co::sleep(2.0);
            echo "co[3] end\n";
        });
        echo "co[2] end\n";
    });

    Co::sleep(1.0);
    echo "co[1] end\n";
});
