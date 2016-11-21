<?php

namespace ChessDomain\FigureStrategy;

use ChessDomain\Entity\ChessBoard;
use ChessDomain\ValueObject\Cell;

class PawnStrategy implements FigureStrategyInterface 
{
    public function moveTo(ChessBoard $chessBoard, Cell $to)
    {
        // TODO: Implement moveTo() method.
    }

    public function getName()
    {
        return 'pawn';
    }
}
