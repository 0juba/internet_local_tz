<?php

namespace ChessDomain\Notifier;

interface NotifierInterface
{
    public function fire($eventName, Event $event);
    public function addListener($eventName, ListenerInterface $listener);
}
