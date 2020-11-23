<?php

function assertComponent($expRes, $realRes, $message = '')
{
    echo $message;
    if ($expRes === $realRes) {
        echo "- passed".PHP_EOL;
    }
    else {
        echo "- failed".PHP_EOL;
    }
}

