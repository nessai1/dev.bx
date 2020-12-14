<?php

include_once('EventBus.php');

class Order
{
    private $eventBus;

    public function __construct(EventBus $eventBus)
    {
        $this->eventBus = $eventBus;
        $this->number = rand(10000, 20000);
    }

    public function save(): void
    {
        echo "Order number {$this->number} was saved\n";
        $this->eventBus->publish('onOrderSave',$this);
    }

    public function getNumber(): string
    {
        return $this->number;
    }
}