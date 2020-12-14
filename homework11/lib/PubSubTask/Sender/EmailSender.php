<?php

class EmailSender
{
    public function send($message): void
    {
        echo "Message was sent via e-mail: {$message}\n";
    }
}
