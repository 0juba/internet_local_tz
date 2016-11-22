<?php

namespace ChessApp\Storage;

use ChessDomain\Entity\ChessBoard;
use ChessDomain\Storage\StorageInterface;

class RedisStorage implements StorageInterface 
{
    public function save(ChessBoard $chessBoard)
    {
        
    }

    public function load()
    {
        
    }
}
