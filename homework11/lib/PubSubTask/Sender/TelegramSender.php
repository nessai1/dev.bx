<?php

class TelegramSender
{
    public function send($message): void
    {
        echo "Message was sent via telegram: {$message}\n";
    }
}