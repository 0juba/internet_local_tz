<?php

namespace ChessDomain\Storage;

use ChessDomain\Entity\ChessBoard;

interface StorageInterface 
{
    public function save(ChessBoard $chessBoard);
    /** @return ChessBoard */
    public function load();
}
