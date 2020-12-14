<?php

class EventBus
{
    private $subscriptions = [];

    public function subscribe(string $eventType, callable $eventHandler) : void
    {
        if (!isset($this->subscriptions[$eventType]))
        {
            $this->subscriptions[$eventType] = [];
        }

        $this->subscriptions[$eventType][] = $eventHandler;
    }

    public function publish(string $eventType, $data) : void
    {
        if(is_array($this->subscriptions[$eventType]))
        {
            foreach($this->subscriptions[$eventType] as $eventHandler)
            {
                $eventHandler($data);
            }
        }
    }
}

