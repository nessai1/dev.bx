<?php


class Logger {

    public static function message($message)
    {
        echo $message.PHP_EOL;
    }

    public static function error($message)
    {
        echo "[Error] ".$message.PHP_EOL;
    }

    public static function title($message)
    {
        echo PHP_EOL.$message.PHP_EOL;
        for ($i = 0; $i < mb_strlen($message); $i++)
        {
            echo '-';
        }
        echo PHP_EOL;
    }
}