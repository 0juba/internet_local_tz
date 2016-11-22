<?php

namespace ChessApp\Storage;

use ChessDomain\Entity\ChessBoard;
use ChessDomain\Storage\StorageInterface;

class RedisStorage implements StorageInterface 
{
    const BOARD_KEY = 'chess:board';

    private $redisClient;

    public function __construct($host, $port = 6379)
    {
        $this->redisClient = new \Predis\Client(array(
            'scheme' => 'tcp',
            'host'   => $host,
            'port'   => $port,
        ));
    }

    public function save(ChessBoard $chessBoard)
    {
       $this->redisClient->set(self::BOARD_KEY, serialize($chessBoard));
    }

    public function load()
    {
        return unserialize($this->redisClient->get(self::BOARD_KEY));
    }
}
