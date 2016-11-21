<?php

namespace ChessDomain\Service;

use ChessDomain\Entity\ChessBoard;
use ChessDomain\Storage\StorageInterface;

class ChessBoardService
{
    /** @var StorageInterface */
    private $storage;

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }

    public function create($size)
    {
        return new ChessBoard($size);
    }

    public function save(ChessBoard $chessBoard)
    {
        $this->storage->save($chessBoard);
    }

    public function load()
    {
        return $this->storage->load();
    }
}
