<?php

namespace ChessApp\Storage;

use ChessDomain\Entity\ChessBoard;
use ChessDomain\Storage\StorageInterface;

class FileStorage implements StorageInterface {

    private $fileName;

    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    public function save(ChessBoard $chessBoard)
    {
        file_put_contents($this->fileName, serialize($chessBoard));
    }

    public function load()
    {
        return unserialize(file_get_contents($this->fileName));
    }
}
