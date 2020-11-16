<?php



function assertComponent($expRes, $realRes, $message = '')
{
    echo $message;
    if ($expRes === $realRes) {
        echo "- OK\n";
    }
    else {
        echo "- failed\n";
    }
}

