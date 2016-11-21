<?php

namespace ChessDomain\Notifier;

class Notifier implements NotifierInterface
{
    private $listeners;

    public function __construct()
    {
        $this->listeners = array();
    }

    public function fire($eventName, Event $event)
    {
        if (empty($this->listeners[$eventName])) {
            return;
        }

        /** @var ListenerInterface $listener */
        foreach ($this->listeners[$eventName] as $listener) {
            $listener->handle($event);
        }
    }

    public function addListener($eventName, ListenerInterface $listener)
    {
        if (!empty($this->listeners[$eventName]) && in_array($listener, $this->listeners[$eventName], true)) {
            return;
        }

        $this->listeners[$eventName][] = $listener;
    }
}
