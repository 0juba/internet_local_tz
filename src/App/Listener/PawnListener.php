<?php

namespace ChessApp\Listener;

use ChessDomain\Notifier\Event;
use ChessDomain\Notifier\ListenerInterface;

class PawnListener implements ListenerInterface
{
    public function handle(Event $event)
    {
        echo 'Added pawn to the board.', PHP_EOL;
    }
}
