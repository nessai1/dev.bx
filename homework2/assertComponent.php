<?php

function assertComponent($expRes, $realRes, $message = '')
{
    echo $message;
    if ($expRes === $realRes) {
        echo "- passed\n";
    }
    else {
        echo "- failed\n";
    }
}

