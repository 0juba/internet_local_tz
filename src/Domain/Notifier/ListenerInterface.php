<?php

namespace ChessDomain\Notifier;

interface ListenerInterface
{
    public function handle(Event $event);
}
