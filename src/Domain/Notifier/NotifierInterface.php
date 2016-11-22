<?php

namespace ChessDomain\Notifier;

interface NotifierInterface
{
    public function notify($eventName, Event $event);
    public function addListener($eventName, ListenerInterface $listener);
}
