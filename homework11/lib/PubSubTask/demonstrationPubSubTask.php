<?php

include_once('./Sender/EmailSender.php');
include_once('./Sender/TelegramSender.php');
include_once('EventBus.php');
include_once('Order.php');

$email = new EmailSender();
$telegram = new TelegramSender();
$eventBus = new EventBus();

$order = new Order($eventBus);

$eventBus->subscribe(
    'onOrderSave',
    function(Order $order) use ($telegram, $email)
    {
        $telegram->send("{$order->getNumber()} has saved");
        $email->send("{$order->getNumber()} has saved");
    });

$order->save();


/*
 * Необходимо воспользоваться шаблоном проектирования "Издатель подписчик"
 * Чтобы при каждом сохранении заказа
 * $order->save();
 * сообщения об этом отправлялись через
 * TelegramSender и EmailSender
 */