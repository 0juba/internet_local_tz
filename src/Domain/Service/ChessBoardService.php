<?php

namespace ChessDomain\Service;

use ChessDomain\Entity\ChessBoard;

class ChessBoardService
{
    public function create($size)
    {
        return new ChessBoard($size);
    }
}
